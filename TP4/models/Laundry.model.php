<?php

class Laundry extends DB
{
    function getLaundry()
    {
        $query = "SELECT * FROM laundry";
        return $this->execute($query);
    }

    function getLaundryById($id)
    {
        $query = "SELECT * FROM laundry WHERE ID_Laundry='$id'";
        return $this->execute($query);
    }

    function addLaundry($data)
    {
        $nama_laundry = $data['nama_laundry'];

        $query = "INSERT INTO laundry VALUES('', '$nama_laundry');";

        return $this->executeAffected($query);
    }

    function updateLaundry($id, $data)
    {
        $nama_laundry = $data['nama_laundry'];

        $query = "UPDATE laundry set nama_laundry='$nama_laundry' where ID_Laundry='$id'";

        return $this->executeAffected($query);
    }

    function deleteLaundry($id)
    {
        $query = "DELETE FROM laundry WHERE ID_Laundry=$id";
        return $this->executeAffected($query);
    }
}
