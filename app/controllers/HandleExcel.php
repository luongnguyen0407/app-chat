<?php
class HandleExcel extends Controller
{
    use LoopData;
    public $staffModal;
    function __construct()
    {
        //modal
        $this->staffModal = $this->callModal('StaffModal');
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
}
