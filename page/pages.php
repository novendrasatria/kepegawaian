<?php
error_reporting(error_reporting() & ~E_NOTICE);
include "page/koneksi.php";


if(isset($_GET['page'])){
  $page = $_GET['page'];

switch ($page) {
    case 'home':
        include 'page/home/home.php';
        break;
    
    case 'data_user':
        include 'page/user/data_user.php';
        break;  
    case 'proses_tambah_user':
        include 'page/user/proses_tambah_user.php';
        break;
    case 'edit_user':
        include 'page/user/edit_user.php';
        break;
    case 'proses_edit_user':
        include 'page/user/proses_edit_user.php';
        break;
    case 'proses_hapus_user':
        include 'page/user/proses_hapus_user.php';
        break;       

    case 'data_divisi':
        include 'page/divisi/data_divisi.php';
        break;
    case 'proses_tambah_divisi':
        include 'page/divisi/proses_tambah_divisi.php';
        break;
    case 'edit_divisi':
        include 'page/divisi/edit_divisi.php';
        break;
    case 'proses_edit_divisi':
        include 'page/divisi/proses_edit_divisi.php';
        break;    
    case 'proses_hapus_divisi':
        include 'page/divisi/proses_hapus_divisi.php';
        break;  

    case 'dok_pegawai':
        include 'page/document/dok_pegawai.php';
        break;
    case 'edit_pegawai':
        include 'page/document/edit_pegawai.php';
        break;
    case 'proses_tambah_pegawai':
        include 'page/proses/proses_tambah_pegawai.php';
        break;    
    case 'proses_edit_pegawai':
        include 'page/proses/proses_edit_pegawai.php';
        break;     
    case 'proses_hapus_pegawai':
        include 'page/proses/proses_hapus_pegawai.php';
        break;
    case 'proses_hapus_dokumen_pegawai':
        include 'page/proses/proses_hapus_dokumen_pegawai.php';
        break;
    case 'preview':
        include 'page/document/preview.php';
        break;

    case 'dok_pangkat':
        include 'page/document/dok_pangkat.php';
        break;   
    case 'edit_pangkat':
        include 'page/document/edit_pangkat.php';
        break;   
    case 'proses_tambah_pangkat':
        include 'page/proses/proses_tambah_pangkat.php';
        break;   
    case 'proses_edit_pangkat':
        include 'page/proses/proses_edit_pangkat.php';
        break; 
    case 'proses_hapus_pangkat':
        include 'page/proses/proses_hapus_pangkat.php';
        break;   

    case 'dok_pensiun':
        include 'page/document/dok_pensiun.php';
        break;    
    case 'edit_pensiun':
        include 'page/document/edit_pensiun.php';
        break;   
    case 'proses_edit_pensiun':
        include 'page/proses/proses_edit_pensiun.php';
        break;   
    case 'proses_hapus_pensiun':
        include 'page/proses/proses_hapus_pensiun.php';
        break;
    case 'pdf_pensiun':
        include 'page/document/pdf_pensiun.php';
        break;   
  
        
    case 'upload_pangkat':
        include 'page/document/upload_pangkat.php';
        break;   
    case 'proses_upload':
        include 'page/document/proses_upload.php';
        break;   
    case 'upload_pegawai':  
        include 'page/document/upload_pegawai.php';
        break;   
    case 'proses_upload_pegawai':
        include 'page/document/proses_upload_pegawai.php';
        break;         
    case 'upload_pensiun':
        include 'page/document/upload_pensiun.php';
        break;   
    case 'proses_upload_pensiun':
        include 'page/document/proses_upload_pensiun.php';
        break;  
     case 'rekap_pegawai':
        include 'page/document/rekap_pegawai.php';
        break;
    case 'edit_rekap':
        include 'page/document/edit_rekap.php';
        break;
     case 'pengaturan_pensiun':
        include 'page/document/pengaturan_pensiun.php';
        break;
    case 'edit_usiapensiun':
        include 'page/document/edit_usiapensiun.php';
        break;
    case 'proses_edit_usiapensiun':
        include 'page/proses/proses_edit_usiapensiun.php';
        break;           
    case 'pegawai_perdivisi':
        include 'page/document/pegawai_perdivisi.php';
        break;
    
    //halaman user

    case 'home2':
        include 'page/home/home.php';
        break;

    case 'data_user2':
        include 'page/userpage/data_user2.php';
        break;   
    case 'tambah_user2':
        include 'page/userpage/tambah_user2.php';
        break;
    case 'edit_user2':
        include 'page/userpage/edit_user2.php';
        break;
    case 'proses_edit_user2':
    include 'page/proses/proses_edit_user2.php';
         break;
    case 'hapus_user2':
        include 'page/userpage/hapus_user2.php';
        break;  

    case 'dok_pegawai2':
        include 'page/userpage/dok_pegawai2.php';
        break;
    case 'edit_pegawai2':
        include 'page/userpage/edit_pegawai2.php';
        break;    
    case 'proses_tambah_pegawai2':
        include 'page/proses/proses_tambah_pegawai2.php';
        break;   
    case 'proses_edit_pegawai2':
        include 'page/proses/proses_edit_pegawai2.php';
        break;       
    case 'proses_hapus_pegawai2':
        include 'page/proses/proses_hapus_pegawai2.php';
        break;
    case 'proses_hapus_pegawai2':
        include 'page/userpage/proses_unduh_fpegawai2.php';
        break;  
case 'edit_dokumen_pegawai2':
        include 'page/userpage/edit_dokumen_pegawai2.php';
        break;
case 'proses_update_file_pegawai2':
        include 'page/proses/proses_update_file_pegawai2.php';
        break;


    case 'dok_pangkat2':
        include 'page/userpage/dok_pangkat2.php';
        break;   
    case 'proses_tambah_pangkat2':
        include 'page/proses/proses_tambah_pangkat2.php';
        break;   
    case 'edit_pangkat2':
        include 'page/userpage/edit_pangkat2.php';
        break;   
    case 'proses_hapus_pangkat2':
        include 'page/proses/proses_hapus_pangkat2.php';
        break;   
  
    case 'dok_pensiun2':
        include 'page/userpage/dok_pensiun2.php';
        break;      
    case 'edit_pensiun2':
        include 'page/userpage/edit_pensiun2.php';
        break;   
    case 'proses_hapus_pensiun2':
        include 'page/proses/proses_hapus_pensiun2.php';
        break; 

    case 'upload_pangkat2':
        include 'page/userpage/upload_pangkat2.php';
        break;   
    case 'proses_upload2':
        include 'page/userpage/proses_upload2.php';
        break;   
    case 'upload_pegawai2':
        include 'page/userpage/upload_pegawai2.php';
        break;   
    case 'proses_upload_pegawai2':
        include 'page/userpage/proses_upload_pegawai2.php';
        break;         
    case 'upload_pensiun2':
        include 'page/userpage/upload_pensiun2.php';
        break;   
    case 'proses_upload_pensiun2':
        include 'page/userpage/proses_upload_pensiun2.php';
        break;
    }
}else{
        include "page/home/home.php";
  }
?>