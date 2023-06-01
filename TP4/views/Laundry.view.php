<?php

class LaundryView
{
    public function render($data)
    {
        $dataLaundry = null;

        $no = 0; 

        foreach ($data as $val) {
            $dataLaundry .=
                '<tr>
            <th scope="row">' . ++$no . '</th>
            <td>' . $val['nama_laundry'] . '</td>
            <td style="font-size: 22px;">
            <a href="formLaundry.php?id=' . $val['ID_Laundry'] . '"><button type="button" class="btn btn-success text-white">Update</button></a>
            <a href="Laundry.php?hapus=' . $val['ID_Laundry'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            </tr>';
        }

        $header = "<tr>
            <th> No </th>
            <th> Nama Laundry </th>
            <th> Nama Agensi </th>
            <th> Action </th>
            </tr>";
        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "formLaundry.php");
        $view->replace("DATA_TITLE", "Laundry");
        $view->replace("DATA_TABLE", $dataLaundry);
        $view->write();
    }
}
