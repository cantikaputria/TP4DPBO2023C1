<?php

class FormMemberView
{
    public function render($data) 
    {
        $dataOption = '<option value="">Pilih Laundry</option>';
        foreach ($data as $temp) {
            $dataOption .= '<option value="' . $temp['ID_Laundry'] . '">' . $temp['nama_laundry'] . '</option>';
        }
  
        $dataForm = null;
        $dataForm = '<label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="id_laundry">ID Laundry:</label>
            <select id="id_laundry" name="id_laundry" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataLaundry, $dataMember)
    {
        $dataOption = null;
        foreach ($dataLaundry as $temp) {
            if ($temp['ID_Laundry'] == $dataMember[0]['ID_Laundry']) {
                $dataOption .= '<option value="' . $temp['ID_Laundry'] . '" selected>' . $temp['nama_laundry'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['ID_Laundry'] . '">' . $temp['nama_laundry'] . '</option>';
            }
        }

        $dataForm = null;
        $dataForm = '<label for="nama">Nama:</label>
            <input type="hidden" name="id" value="' . $dataMember[0]['ID'] . '" >
            <input type="text" id="nama" name="nama" value="' . $dataMember[0]['NAME'] . '" required>

            <label for="ID_Laundry">ID Laundry:</label>
            <select id="ID_Laundry" name="ID_Laundry" required>' . $dataOption .
            '</select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $dataMember[0]['EMAIL'] . '" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"  value="' . $dataMember[0]['PHONE'] . '" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date"  value="' . $dataMember[0]['JOIN_DATE'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "form.php");
        $view->replace("DATA_TITLE", "Member");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}
