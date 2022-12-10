<?php
class HandleExcel extends Controller
{
    use LoopData;
    public $staffModel;
    public $positionModel;
    function __construct()
    {
        //model
        if (!$this->checkUser(true)) {
            header('location: ./Attendance');
        }
        $this->staffModel = $this->callModel('StaffModel');
        $this->positionModel = $this->callModel('PositionModel');
        $this->departmentModel = $this->callModel('DepartmentModel');
    }
    public function Export()
    {
        $kq = $this->returnArray($this->staffModel->getStaffExcel());
        // die;
        if (!empty($kq)) {
            try {
                //code...

                $excel = new PHPExcel();
                $excel->setActiveSheetIndex(0);
                $excel->getActiveSheet()->setTitle('Danh Sách Nhân Viên');

                $excel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);


                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('I')->setWidth(50);


                $excel->getActiveSheet()->setCellValue('A1', 'HỌ VÀ TÊN');
                $excel->getActiveSheet()->setCellValue('B1', 'NGÀY SINH');
                $excel->getActiveSheet()->setCellValue('C1', 'SỐ ĐIỆN THOẠI');
                $excel->getActiveSheet()->setCellValue('D1', 'CĂN CƯỚC');
                $excel->getActiveSheet()->setCellValue('E1', 'SỐ HỢP ĐỒNG');
                $excel->getActiveSheet()->setCellValue('F1', 'NGÀY KÝ');
                $excel->getActiveSheet()->setCellValue('G1', 'NGÀY HẾT HẠN');
                $excel->getActiveSheet()->setCellValue('H1', 'PHÒNG BAN');
                $excel->getActiveSheet()->setCellValue('I1', 'ĐỊA CHỈ');

                $startRow = 2;
                foreach ($kq as $row) {
                    $excel->getActiveSheet()->setCellValue('A' . $startRow, $row['ho_ten']);
                    $excel->getActiveSheet()->setCellValue('B' . $startRow, $row['ngay_sinh']);
                    $excel->getActiveSheet()->setCellValue('C' . $startRow, $row['so_dien_thoai']);
                    $excel->getActiveSheet()->setCellValue('D' . $startRow, $row['can_cuoc']);
                    $excel->getActiveSheet()->setCellValue('E' . $startRow, $row['so_hop_dong']);
                    $excel->getActiveSheet()->setCellValue('F' . $startRow, $row['ngay_bat_dau']);
                    $excel->getActiveSheet()->setCellValue('G' . $startRow, $row['ngay_ket_thuc']);
                    $excel->getActiveSheet()->setCellValue('H' . $startRow, $row['ten_phong']);
                    $excel->getActiveSheet()->setCellValue('I' . $startRow, $row['dia_chi']);
                    $startRow++;
                }
                ob_end_clean();
                header('Content-type:application/vnd.ms-excel');
                header('Content-Disposition:attachment; filename="danh_sach_nhan_vien_' . time() . '.xlsx"');
                PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function ExportSalary($date)
    {
        if (empty($date)) {
            header('location: ../../Salary');
        }
        $date = explode("-", $date);
        $kq = $this->staffModel->getAllSalary($date[1], $date[0]);
        // PrintDisplay::printFix($kq);
        // return;
        // die;
        if (!empty($kq)) {
            try {
                //code...

                $excel = new PHPExcel();
                $excel->setActiveSheetIndex(0);
                $excel->getActiveSheet()->setTitle('Danh Sách Nhân Viên');

                $excel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);


                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                $excel->getActiveSheet()->setCellValue('A1', 'HỌ VÀ TÊN');
                $excel->getActiveSheet()->setCellValue('B1', 'GIOI TINH');
                $excel->getActiveSheet()->setCellValue('C1', 'LUONG CUNG');
                $excel->getActiveSheet()->setCellValue('D1', 'SO GIO LAM');
                $excel->getActiveSheet()->setCellValue('E1', 'LUONG NHAN');
                $excel->getActiveSheet()->setCellValue('F1', 'NGAY NGHI LE');

                $startRow = 2;
                foreach ($kq as $row) {
                    $hoursWork = intdiv($row['min'], 60) . 'h' . ($row['min'] % 60);
                    $salaryMonth = calculatorSalary($row['holiday'], $row['min'], $row['luong_cung']);
                    $excel->getActiveSheet()->setCellValue('A' . $startRow, $row['ho_ten']);
                    $excel->getActiveSheet()->setCellValue('B' . $startRow, $row['gioi_tinh']);
                    $excel->getActiveSheet()->setCellValue('C' . $startRow, $row['luong_cung']);
                    $excel->getActiveSheet()->setCellValue('D' . $startRow, $hoursWork);
                    $excel->getActiveSheet()->setCellValue('E' . $startRow, number_format($salaryMonth, 0, ".", ".") . "đ");
                    $excel->getActiveSheet()->setCellValue('F' . $startRow, $row['holiday']);
                    $startRow++;
                }
                ob_end_clean();
                header('Content-type:application/vnd.ms-excel');
                header('Content-Disposition:attachment; filename="danh_sach_luong_thang_' . $date[0] . '_' . time() . '.xlsx"');
                PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
    public function Import()
    {
        $status = array();
        if (empty($_FILES['import_excel'])) $status['error'] = 'Missing file excel';
        $file = $_FILES['import_excel'];
        $file_size = $file['size'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($ext != 'xlsx') {
            $this->callView('Master', [
                'Page' => 'AddStaffPage',
                'Position' => $this->returnArray($this->positionModel->getPosition()),
                'Department' => $this->returnArray($this->departmentModel->getDepartment()),
                'status' => "Định dạng file không đúng",
            ]);
        } else {
            $size = 10;
            $sizeFile = $file_size / 1024 / 1024;
            if ($sizeFile > $size) {
                $status['error'] = 'Dung lượng file quá lớn';
            } else {
                $file_name =  strlen($file['name']) > 10 ? substr($file['name'], 0, 10) : $file['name'];
                $newFileName = $file_name . time() . "." . $ext;
                $upload =  move_uploaded_file($file['tmp_name'], './public/excel/' . $newFileName);
            }
        }
        if (empty($status) && !empty($upload)) {
            $readFile = './public/excel/' . $newFileName;
            $objFile = PHPExcel_IOFactory::identify($readFile);
            $objData = PHPExcel_IOFactory::createReader($objFile);

            //only read

            // $objData->setReadDataOnly(true);

            // cover data to obj

            $objPHPExcel =  $objData->load($readFile);

            //ch sheet

            $sheet = $objPHPExcel->setActiveSheetIndex(0);

            //get row end
            $totalRow = $sheet->getHighestRow();
            //get name col end
            $lastCol = $sheet->getHighestColumn();


            $totalCol = PHPExcel_Cell::columnIndexFromString($lastCol);

            $data = array();

            for ($i = 2; $i <=  $totalRow; $i++) {
                # code...
                for ($j = 0; $j <  $totalCol; $j++) {
                    # code...
                    $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }
            if (!empty($data)) {
                $kq =  $this->staffModel->addNewStaffExcel($data);
                if (empty($kq)) {
                    $this->callView('Master', [
                        'Page' => 'AddStaffPage',
                        'Position' => $this->returnArray($this->positionModel->getPosition()),
                        'Department' => $this->returnArray($this->departmentModel->getDepartment()),
                        'status' => "Thêm nhân viên thành công",
                    ]);
                } else {
                    $this->callView('Master', [
                        'Page' => 'AddStaffPage',
                        'Position' => $this->returnArray($this->positionModel->getPosition()),
                        'Department' => $this->returnArray($this->departmentModel->getDepartment()),
                        'excelError' => $kq
                    ]);
                }
            }
            unlink('./public/excel/' . $newFileName);
        }
    }
}
