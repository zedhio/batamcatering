<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends CI_Model {

    // --------------------- Model untuk admin ---------------------
    function tampil_member() 
    {
        $this->db->where('level', 'member');
        $ambil = $this->db->get('user');
        $data = $ambil->result_array();

        $semua = array();
        foreach ($data as $key => $value) {
            $this->db->where('id_user', $value['id_user']);
            $ambil1 = $this->db->get('dokumen_user');
            $data1 = $ambil1->row_array();
            $value['dokumen'] = $data1;

            $semua[] = $value;
        }

        return $semua;
    }

    function ambil_visitor($id_visitor) 
    {
        $this->db->where('id_visitor', $id_visitor);
        $ambil = $this->db->get('visitor');
        $data = $ambil->row_array();
        return $data;
    } 

    function tambah_pesan_admin($inputan,$id_visitor,$email)
    {
        //include_once APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';

        $this->db->where('id_visitor',$id_visitor);
        $this->db->insert('visitor',$inputan);

        $from = "noreply@event-sharing.me";
        $to = "$email";
        $subject = "Autoresponder";
        $message = "Terimakasih telah menghubung kami (Event Sharing). '".$inputan['pesan_admin']."'";
        $headers = "From:" . $from;
        
        mail($to, $subject, $message, $headers);

        //$mail = new PHPMailer();
        
        //$mail->IsSMTP(); 
        // telling the class to use SMTP

        // TAMBAHAN
        // Menggunakan SMTP option. Agar jika localhost pakai SSL tetep kekirim emailnya.
        //$mail->SMTPOptions = array(
            //'ssl' => array(
                //'verify_peer' => false,
                //'verify_peer_name' => false,
                //'allow_self_signed' => true
                //)
            //);

        //$mail->Host = "smtp.gmail.com"; // SMTP server 
        //$mail->SMTPDebug = 0; // enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only 
        //$mail->SMTPAuth = true; // enable SMTP authentication 
        //$mail->SMTPSecure = "tls"; // sets the prefix to the servier 
        //$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server 
        //$mail->Port = 587; // set the SMTP port for the GMAIL server 
        //$mail->Username = "tugaskuliahdemikelulusan@gmail.com"; // GMAIL username 
        //$mail->Password = "12345678ab$"; // GMAIL password

        //$mail->SetFrom('tugaskuliahdemikelulusan@gmail.com', 'Event Sharing');

        //$mail->AddReplyTo("tugaskuliahdemikelulusan@gmail.com", "Event Sharing");

        //$mail->Subject = "Balasan Admin Event Sharing";

        //$mail->AltBody = "Untuk melihat pesan, mohon gunakan pembaca email yang kompatibel dengan HTML!"; // optional, comment out and test

        //$mail->MsgHTML($isi);

        //$address = $email; 
        //$mail->AddAddress($address);

        //$mail->Send();
    }

    function tambah_pesan_visitor($inputan)
    {
        $this->db->insert('visitor', $inputan);
    }

    function validasi($id_user)
    {
        $inputan['status'] = 1;
        $this->db->where('id_user', $id_user);
        $this->db->update('dokumen_user', $inputan);
    }

    function aktif_akun($id_user)
    {
        $inputan['status'] = 1;
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $inputan);
    }

    function nonaktif_akun($id_user)
    {
        $inputan['status'] = 0;
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $inputan);
    }

}
?>