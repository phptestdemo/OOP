<?php



/**
 * summary
 */
class Category extends database
{
    /**
     * summary
     */
    // public function __construct()
    // {
        
    // }
    
    public function getCategory()
    {
    	$sql = "SELECT tl.*, GROUP_CONCAT(DISTINCT lt.id, '|', lt.Ten, '|', lt.TenKhongDau) as Loaitin, 
                tt.id AS idTin, tt.TieuDe, tt.Hinh AS image, 
                tt.TomTat, tt.TieuDeKhongDau, tt.NoiDung, tt.NoiBat, 
                tt.SoLuotXem, tt.created_at AS creat_tin, tt.updated_at AS updated_tin
                FROM theloai tl INNER JOIN loaitin lt ON tl.id = lt.idTheLoai
                INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id
                GROUP BY tl.id";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }
}