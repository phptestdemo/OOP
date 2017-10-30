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

    public function getNewsByIdLoai($id, $vitri = -1, $limit = -1)
    {
        $sql = "SELECT * FROM tintuc WHERE idLoaiTin = $id";

        if ($vitri > -1 && $limit > 1) {
        	$sql .= " limit $vitri, $limit"; // chu co dau cach truoc limit, neu ko phi cach sau $id o tren
        }
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM loaitin WHERE id = $id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
}