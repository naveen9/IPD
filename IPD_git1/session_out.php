<?php
session_start();
//error_reporting(0);
$page=$_REQUEST['page'];
if($page=='in')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
     unset ($_SESSION['b_id']);

       
    header('location:ipd_visit.php');
}

if($page=='ad')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:admission-ipd.php');
}

if($page=='mc')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:consultation.php');
}












if($page=='op')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:operation-theater.php');
}







if($page=='ro')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no1']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['paid_amount1']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
             unset ($_SESSION['b_id']);

       
    header('location:ip-management.php');
}









if($page=='vi')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:visit_proc.php');
}
if($page=='pr')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:visit_proc1.php');
}







if($page=='me')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['dom']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:medicine.php');
}




if($page=='co')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['dom']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:consumable.php');
}




if($page=='re')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:receive_payment1.php');
}





if($page=='vii')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
unset($_SESSION['paid_amount1']);
unset($_SESSION['paymentmode']);
     unset($_SESSION['panel']);
      unset ($_SESSION['b_id']);
     unset($_SESSION['corp']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
       
    header('location:ipd_visit_summary.php');
}




if($page=='di')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
     unset ($_SESSION['b_id']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);

       
    header('location:diagnostics.php');
}



if($page=='bi')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
      unset ($_SESSION['b_id']);
     unset($_SESSION['corp']);

       
    header('location:opd-visit-summary.php');
}



if($page=='ou')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:opd_visit.php');
}


if($page=='pa')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
      unset ($_SESSION['b_id']);

       
    header('location:clienthome.php');
}








if($page=='medicine')
{


unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['v_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['visit_date']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['crnt_gvn_anmt']);
    unset($_SESSION['mode']);
     unset($_SESSION['panel']);
     unset($_SESSION['corp']);
 unset ($_SESSION['b_id']);
       
    header('location:f_medicine.php');
}
    ?>


    







    