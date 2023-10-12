   <?php
   include('config/dbcon.php');
   include('urldefine.php');
   // Execute MySQL query to calculate sum of bil_amount by com_name=ACI PHARMA

   $aci_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='ACI PHARMA'";

   $aci_pharma_sales_run = mysqli_query($conn, $aci_pharma_sales);

   // Fetch the result as an associative array
   $aci_pharma_sales_run_data = mysqli_fetch_assoc($aci_pharma_sales_run);

   // Print the total amount
   //echo "Total amount for ACI PHARMA: " . $aci_pharma_sales_total_amount =
   $aci_pharma_sales_run_data["total_amountt"];
   $aci_pharma_sales_total_amount = $aci_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=aci_pharma and paid_bill_date=NULL
   $aci_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='ACI PHARMA' AND
   paid_bill_date IS NOT NULL";

   $aci_pharma_null_run = mysqli_query($conn, $aci_pharma_null);

   // Fetch the result as an associative array
   $aci_pharma_null_run_row = mysqli_fetch_assoc($aci_pharma_null_run);

   // Print the total amount
   //echo "Total amount for aci_pharma with NULL paid_bill_date: " . $aci_pharma_due_total_amount =
   $aci_pharma_null_run_row["total_amount"];
   $aci_pharma_due_total_amount = $aci_pharma_null_run_row["total_amount"];

   $aci_pharma_due_amount = $aci_pharma_sales_total_amount - $aci_pharma_due_total_amount;





   //ACI ANIMAL HEALTH PHARMA
   $aci_animal_health_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='ACI ANIMAL HEALTH'";

   $aci_animal_health_pharma_sales_run = mysqli_query($conn, $aci_animal_health_pharma_sales);

   // Fetch the result as an associative array
   $aci_animal_health_pharma_sales_run_data = mysqli_fetch_assoc($aci_animal_health_pharma_sales_run);

   // Print the total amount
   $aci_animal_health_pharma_sales_total_amount = $aci_animal_health_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=aci_animal_health_pharma and paid_bill_date=NULL
   $aci_animal_health_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='ACI ANIMAL HEALTH' AND
   paid_bill_date IS NOT NULL";

   $aci_animal_health_pharma_null_run = mysqli_query($conn, $aci_animal_health_pharma_null);

   // Fetch the result as an associative array
   $aci_animal_health_pharma_null_run_row = mysqli_fetch_assoc($aci_animal_health_pharma_null_run);

   // Print the total amount
   $aci_animal_health_pharma_due_total_amount = $aci_animal_health_pharma_null_run_row["total_amount"];

   $aci_animal_health_pharma_due_amount = $aci_animal_health_pharma_sales_total_amount - $aci_animal_health_pharma_due_total_amount;


   // Execute MySQL query to calculate sum of bil_amount by com_name=beacon PHARMA

   $beacon_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='BEACON'";

   $beacon_pharma_sales_run = mysqli_query($conn, $beacon_pharma_sales);

   // Fetch the result as an associative array
   $beacon_pharma_sales_run_data = mysqli_fetch_assoc($beacon_pharma_sales_run);

   // Print the total amount
   $beacon_pharma_sales_total_amount = $beacon_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=beacon_pharma and paid_bill_date=NULL
   $beacon_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='BEACON' AND
   paid_bill_date IS NOT NULL";

   $beacon_pharma_null_run = mysqli_query($conn, $beacon_pharma_null);

   // Fetch the result as an associative array
   $beacon_pharma_null_run_row = mysqli_fetch_assoc($beacon_pharma_null_run);

   // Print the total amount
   $beacon_pharma_due_total_amount = $beacon_pharma_null_run_row["total_amount"];

   $beacon_pharma_due_amount = $beacon_pharma_sales_total_amount - $beacon_pharma_due_total_amount;






   //Beximco PHARMA

   $beximco_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='BEXIMCO'";

   $beximco_pharma_sales_run = mysqli_query($conn, $beximco_pharma_sales);

   // Fetch the result as an associative array
   $beximco_pharma_sales_run_data = mysqli_fetch_assoc($beximco_pharma_sales_run);

   // Print the total amount
   $beximco_pharma_sales_total_amount = $beximco_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=beximco_pharma and paid_bill_date=NULL
   $beximco_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='BEXIMCO' AND
   paid_bill_date IS NOT NULL";

   $beximco_pharma_null_run = mysqli_query($conn, $beximco_pharma_null);

   // Fetch the result as an associative array
   $beximco_pharma_null_run_row = mysqli_fetch_assoc($beximco_pharma_null_run);

   // Print the total amount
   $beximco_pharma_due_total_amount = $beximco_pharma_null_run_row["total_amount"];

   $beximco_pharma_due_amount = $beximco_pharma_sales_total_amount - $beximco_pharma_due_total_amount;






   //GENERAL PHARMA

   $general_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='GENERAL'";

   $general_pharma_sales_run = mysqli_query($conn, $general_pharma_sales);

   // Fetch the result as an associative array
   $general_pharma_sales_run_data = mysqli_fetch_assoc($general_pharma_sales_run);

   // Print the total amount
   $general_pharma_sales_total_amount = $general_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=general_pharma and paid_bill_date=NULL
   $general_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='GENERAL' AND
   paid_bill_date IS NOT NULL";

   $general_pharma_null_run = mysqli_query($conn, $general_pharma_null);

   // Fetch the result as an associative array
   $general_pharma_null_run_row = mysqli_fetch_assoc($general_pharma_null_run);

   // Print the total amount
   $general_pharma_due_total_amount = $general_pharma_null_run_row["total_amount"];

   $general_pharma_due_amount = $general_pharma_sales_total_amount - $general_pharma_due_total_amount;



   // OPSONIN PHARMA

   $opsonin_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='OPSONIN'";

   $opsonin_pharma_sales_run = mysqli_query($conn, $opsonin_pharma_sales);

   // Fetch the result as an associative array
   $opsonin_pharma_sales_run_data = mysqli_fetch_assoc($opsonin_pharma_sales_run);

   // Print the total amount
   $opsonin_pharma_sales_total_amount = $opsonin_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=opsonin_pharma and paid_bill_date=NULL
   $opsonin_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='OPSONIN' AND
   paid_bill_date IS NOT NULL";

   $opsonin_pharma_null_run = mysqli_query($conn, $opsonin_pharma_null);

   // Fetch the result as an associative array
   $opsonin_pharma_null_run_row = mysqli_fetch_assoc($opsonin_pharma_null_run);

   // Print the total amount
   $opsonin_pharma_due_total_amount = $opsonin_pharma_null_run_row["total_amount"];

   $opsonin_pharma_due_amount = $opsonin_pharma_sales_total_amount - $opsonin_pharma_due_total_amount;



   // INCEPTA PHARMA

   $incepta_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='INCEPTA'";

   $incepta_pharma_sales_run = mysqli_query($conn, $incepta_pharma_sales);

   // Fetch the result as an associative array
   $incepta_pharma_sales_run_data = mysqli_fetch_assoc($incepta_pharma_sales_run);

   // Print the total amount
   $incepta_pharma_sales_total_amount = $incepta_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=incepta_pharma and paid_bill_date=NULL
   $incepta_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='INCEPTA' AND
   paid_bill_date IS NOT NULL";

   $incepta_pharma_null_run = mysqli_query($conn, $incepta_pharma_null);

   // Fetch the result as an associative array
   $incepta_pharma_null_run_row = mysqli_fetch_assoc($incepta_pharma_null_run);

   // Print the total amount
   $incepta_pharma_due_total_amount = $incepta_pharma_null_run_row["total_amount"];

   $incepta_pharma_due_amount = $incepta_pharma_sales_total_amount - $incepta_pharma_due_total_amount;


   // SYNOVIA PHARMA

   $synovia_pharma_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='SYNOVIA'";

   $synovia_pharma_sales_run = mysqli_query($conn, $synovia_pharma_sales);

   // Fetch the result as an associative array
   $synovia_pharma_sales_run_data = mysqli_fetch_assoc($synovia_pharma_sales_run);

   // Print the total amount
   $synovia_pharma_sales_total_amount = $synovia_pharma_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=synovia_pharma and paid_bill_date=NULL
   $synovia_pharma_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='SYNOVIA' AND
   paid_bill_date IS NOT NULL";

   $synovia_pharma_null_run = mysqli_query($conn, $synovia_pharma_null);

   // Fetch the result as an associative array
   $synovia_pharma_null_run_row = mysqli_fetch_assoc($synovia_pharma_null_run);

   // Print the total amount
   $synovia_pharma_due_total_amount = $synovia_pharma_null_run_row["total_amount"];

   $synovia_pharma_due_amount = $synovia_pharma_sales_total_amount - $synovia_pharma_due_total_amount;



   $all_due_amount = $aci_pharma_due_amount + $aci_animal_health_pharma_due_amount + $beacon_pharma_due_amount + $beximco_pharma_due_amount + $general_pharma_due_amount + $opsonin_pharma_due_amount + $incepta_pharma_due_amount + $synovia_pharma_due_amount;

















   // Lamination
   //Alif

   $lam_alif_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='ALIF'";

   $lam_alif_sales_run = mysqli_query($conn, $lam_alif_sales);

   // Fetch the result as an associative array
   $lam_alif_sales_run_data = mysqli_fetch_assoc($lam_alif_sales_run);

   // Print the total amount
   $lam_alif_sales_total_amount = $lam_alif_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_alif and paid_bill_date=NULL
   $lam_alif_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='ALIF' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_alif_null_run = mysqli_query($conn, $lam_alif_null);

   // Fetch the result as an associative array
   $lam_alif_null_run_row = mysqli_fetch_assoc($lam_alif_null_run);

   // Print the total amount
   $lam_alif_due_total_amount = $lam_alif_null_run_row["total_amount"];

   $lam_alif_due_amount = $lam_alif_sales_total_amount - $lam_alif_due_total_amount;



   //golden

   $lam_golden_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Golden'";

   $lam_golden_sales_run = mysqli_query($conn, $lam_golden_sales);

   // Fetch the result as an associative array
   $lam_golden_sales_run_data = mysqli_fetch_assoc($lam_golden_sales_run);

   // Print the total amount
   $lam_golden_sales_total_amount = $lam_golden_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_golden and paid_bill_date=NULL
   $lam_golden_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Golden' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_golden_null_run = mysqli_query($conn, $lam_golden_null);

   // Fetch the result as an associative array
   $lam_golden_null_run_row = mysqli_fetch_assoc($lam_golden_null_run);

   // Print the total amount
   $lam_golden_due_total_amount = $lam_golden_null_run_row["total_amount"];

   $lam_golden_due_amount = $lam_golden_sales_total_amount - $lam_golden_due_total_amount;






   //Islami

   $lam_islami_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Islami'";

   $lam_islami_sales_run = mysqli_query($conn, $lam_islami_sales);

   // Fetch the result as an associative array
   $lam_islami_sales_run_data = mysqli_fetch_assoc($lam_islami_sales_run);

   // Print the total amount
   $lam_islami_sales_total_amount = $lam_islami_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_islami and paid_bill_date=NULL
   $lam_islami_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Islami' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_islami_null_run = mysqli_query($conn, $lam_islami_null);

   // Fetch the result as an associative array
   $lam_islami_null_run_row = mysqli_fetch_assoc($lam_islami_null_run);

   // Print the total amount
   $lam_islami_due_total_amount = $lam_islami_null_run_row["total_amount"];

   $lam_islami_due_amount = $lam_islami_sales_total_amount - $lam_islami_due_total_amount;





   //Meghna

   $lam_meghna_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Meghna'";

   $lam_meghna_sales_run = mysqli_query($conn, $lam_meghna_sales);

   // Fetch the result as an associative array
   $lam_meghna_sales_run_data = mysqli_fetch_assoc($lam_meghna_sales_run);

   // Print the total amount
   $lam_meghna_sales_total_amount = $lam_meghna_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_meghna and paid_bill_date=NULL
   $lam_meghna_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Meghna' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_meghna_null_run = mysqli_query($conn, $lam_meghna_null);

   // Fetch the result as an associative array
   $lam_meghna_null_run_row = mysqli_fetch_assoc($lam_meghna_null_run);

   // Print the total amount
   $lam_meghna_due_total_amount = $lam_meghna_null_run_row["total_amount"];

   $lam_meghna_due_amount = $lam_meghna_sales_total_amount - $lam_meghna_due_total_amount;




   //MIM UV

   $lam_mim_uv_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='MIM UV'";

   $lam_mim_uv_sales_run = mysqli_query($conn, $lam_mim_uv_sales);

   // Fetch the result as an associative array
   $lam_mim_uv_sales_run_data = mysqli_fetch_assoc($lam_mim_uv_sales_run);

   // Print the total amount
   $lam_mim_uv_sales_total_amount = $lam_mim_uv_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_mim_uv and paid_bill_date=NULL
   $lam_mim_uv_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='MIM UV' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_mim_uv_null_run = mysqli_query($conn, $lam_mim_uv_null);

   // Fetch the result as an associative array
   $lam_mim_uv_null_run_row = mysqli_fetch_assoc($lam_mim_uv_null_run);

   // Print the total amount
   $lam_mim_uv_due_total_amount = $lam_mim_uv_null_run_row["total_amount"];

   $lam_mim_uv_due_amount = $lam_mim_uv_sales_total_amount - $lam_mim_uv_due_total_amount;



   //Anika

   $lam_anika_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Anika'";

   $lam_anika_sales_run = mysqli_query($conn, $lam_anika_sales);

   // Fetch the result as an associative array
   $lam_anika_sales_run_data = mysqli_fetch_assoc($lam_anika_sales_run);

   // Print the total amount
   $lam_anika_sales_total_amount = $lam_anika_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_anika and paid_bill_date=NULL
   $lam_anika_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Anika' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_anika_null_run = mysqli_query($conn, $lam_anika_null);

   // Fetch the result as an associative array
   $lam_anika_null_run_row = mysqli_fetch_assoc($lam_anika_null_run);

   // Print the total amount
   $lam_anika_due_total_amount = $lam_anika_null_run_row["total_amount"];

   $lam_anika_due_amount = $lam_anika_sales_total_amount - $lam_anika_due_total_amount;



   //Rangdhonu

   $lam_rangdhonu_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Rangdhonu'";

   $lam_rangdhonu_sales_run = mysqli_query($conn, $lam_rangdhonu_sales);

   // Fetch the result as an associative array
   $lam_rangdhonu_sales_run_data = mysqli_fetch_assoc($lam_rangdhonu_sales_run);

   // Print the total amount
   $lam_rangdhonu_sales_total_amount = $lam_rangdhonu_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_rangdhonu and paid_bill_date=NULL
   $lam_rangdhonu_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Rangdhonu' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_rangdhonu_null_run = mysqli_query($conn, $lam_rangdhonu_null);

   // Fetch the result as an associative array
   $lam_rangdhonu_null_run_row = mysqli_fetch_assoc($lam_rangdhonu_null_run);

   // Print the total amount
   $lam_rangdhonu_due_total_amount = $lam_rangdhonu_null_run_row["total_amount"];

   $lam_rangdhonu_due_amount = $lam_rangdhonu_sales_total_amount - $lam_rangdhonu_due_total_amount;



   //Matrix

   $lam_matrix_sales = "SELECT SUM(lam_bil_amount) AS total_amountt FROM lamination_bills_view WHERE lam_com_name='Matrix'";

   $lam_matrix_sales_run = mysqli_query($conn, $lam_matrix_sales);

   // Fetch the result as an associative array
   $lam_matrix_sales_run_data = mysqli_fetch_assoc($lam_matrix_sales_run);

   // Print the total amount
   $lam_matrix_sales_total_amount = $lam_matrix_sales_run_data["total_amountt"];


   // Execute MySQL query to calculate sum of bil_amount by com_name=lam_matrix and paid_bill_date=NULL
   $lam_matrix_null = "SELECT SUM(lam_bil_amount) AS total_amount FROM lamination_bills_view WHERE lam_com_name='Matrix' AND
   lam_paid_bill_date IS NOT NULL";

   $lam_matrix_null_run = mysqli_query($conn, $lam_matrix_null);

   // Fetch the result as an associative array
   $lam_matrix_null_run_row = mysqli_fetch_assoc($lam_matrix_null_run);

   // Print the total amount
   $lam_matrix_due_total_amount = $lam_matrix_null_run_row["total_amount"];

   $lam_matrix_due_amount = $lam_matrix_sales_total_amount - $lam_matrix_due_total_amount;




   $lamination_all_due_amount = $lam_alif_due_amount + $lam_golden_due_amount + $lam_islami_due_amount + $lam_meghna_due_amount + $lam_mim_uv_due_amount + $lam_anika_due_amount + $lam_rangdhonu_due_amount + $lam_matrix_due_amount;

   $paper_all_due_amount = "SELECT SUM(paper_bil_amount) AS total_sum FROM paper_bills_view WHERE paper_paid_bill_date IS NULL;";

   $balance_total = $all_due_amount - $lamination_all_due_amount - $paper_all_due_amount;



   ?>