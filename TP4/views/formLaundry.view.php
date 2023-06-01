<?php

class FormLaundryView
{
    public function render()
    {
        $dataForm = null;
        $dataForm = '<label for="nama_laundry">Nama Laundry:</label>
            <input type="text" id="nama_laundry" name="nama_laundry" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formLaundry.php");
        $view->replace("DATA_TITLE", "Laundry");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataLaundry)
    {
        $dataForm = null;
        $dataForm = '<label for="nama_laundry">Nama Laundry:</label>
            <input type="hidden" name="id" value="' . $dataLaundry[0]['ID_Laundry'] . '" >
            <input type="text" id="nama_laundry" name="nama_laundry" value="' . $dataLaundry[0]['nama_laundry'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit">Submit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formLaundry.php");
        $view->replace("DATA_TITLE", "Laundry");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}
