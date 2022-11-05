<?php
class HandleExcel extends Controller
{
    use LoopData;
    public $staffModal;
    public $positionModal;
    function __construct()
    {
        //modal
        $this->staffModal = $this->callModal('StaffModal');
        $this->positionModal = $this->callModal('PositionModal');
        $this->departmentModal = $this->callModal('DepartmentModal');
    }
    public function Export()
    {
        $kq = $this->returnArray($this->staffModal->getStaffExcel());
        // PrintDisplay::printFix($kq);
        if (!empty($kq)) {
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
            header('Content-type:application/vnd.ms-excel');
            header('Content-Disposition:attachment; filename="danh_sach_nhan_vien_' . time() . '.xlsx"');
            PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
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
            $status['error'] = 'Định dạng file không đúng';
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
                $kq =  $this->staffModal->addNewStaffExcel($data);
                if (empty($kq)) {
                    $this->callView('Master', [
                        'Page' => 'AddStaffPage',
                        'Position' => $this->returnArray($this->positionModal->getPosition()),
                        'Department' => $this->returnArray($this->departmentModal->getDepartment()),
                        'status' => true,
                    ]);
                } else {
                    $this->callView('Master', [
                        'Page' => 'AddStaffPage',
                        'Position' => $this->returnArray($this->positionModal->getPosition()),
                        'Department' => $this->returnArray($this->departmentModal->getDepartment()),
                        'excelError' => $kq
                    ]);
                }
            }
            unlink('./public/excel/' . $newFileName);
        }
    }
}
