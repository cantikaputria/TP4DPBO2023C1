<?php

class Member extends DB
{
    function getMemberFull()
    {
        $query = "SELECT * FROM members JOIN laundry ON members.ID_LAUNDRY=laundry.ID_LAUNDRY ORDER BY members.ID";
        return $this->execute($query);
    }

    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE ID=$id;";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $id_laundry = $data['id_laundry'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO members VALUES('', '$id_laundry', '$nama', '$email', '$phone', '$join_date');";

        return $this->executeAffected($query);
    }

    function updateMember($id, $data)
    {
        $id_laundry = $data['ID_Laundry'];
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $query = "UPDATE members SET ID_LAUNDRY='$id_laundry', NAME='$nama', EMAIL='$email', PHONE='$phone', JOIN_DATE='$join_date' WHERE ID='$id';";

        return $this->executeAffected($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE ID=$id";
        return $this->executeAffected($query);
    }
}
