<?php /* start php program */
  /* Featch data using covid github api */
  $world_data = file_get_contents("https://pomber.github.io/covid19/timeseries.json");
  $json_world = json_decode($world_data, true);
  /* loop for data array counting */
  foreach ($json_world as $key => $value) {
    $data_count = count($value)-1;
    $data_count_prev = $data_count-1;
  }
  /* Total covid-19 variable */
  $total_case = 0;
  $total_reco = 0;
  $total_death = 0;
  /* loop for get total covid data */
  foreach ($json_world as $key => $value) {
      $total_case = $total_case + $value[$data_count]['confirmed'];
      $total_reco = $total_reco + $value[$data_count]['recovered'];
      $total_death = $total_death + $value[$data_count]['deaths'];

  }

?> <!-- close php program -->
<!-- Start HTML5 program -->
<!DOCTYPE html>
<html>
<head>
	 <!-- Required link bootstrap stylesheet -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Google Adsence -->
    <script data-ad-client="ca-pub-9713082973193234" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Google Search Console -->
    <meta name="google-site-verification" content="IO-pm9ZFBU37BeaYlIUCImaWpCA145SYorrDkaAdqk4" />
    <!-- Image animation bootstrap -->
    <style type="text/css">
      .coro img { animation: gocorona 3s linear infinite; }
      @keyframes gocorona{ 
          0% { transform: rotate(0); }
          100% { transform: rotate(360deg); }
        }

     .leftside img{ animation: heartbeat 6s linear infinite; }
     @keyframes heartbeat{
          0% { transform: scale(.75); }
          20% { transform: scale(1); }
          40% { transform: scale(.75); }
          60% { transform: scale(1); }
          80% { transform: scale(.75); }
          100% { transform: scale(.75); }
        }
    </style>

	<title>Covid Tracker</title>
</head>
<body>
    <!-- Covid-19 Tracker Container -->
     <div class="container-fluid bg-light p-5 text-center my-3">
     	<h1>Covid-19 Tracker</h1>
     	<h5 class="text-muted">An Open Source project to keep track of all the COVID-19 cases around the world</h5>	
     </div>
    
	<!-- Image/text animation container -->
     <div class="main-header">
  <div class="row w-100 h-100">
        <div class="col-lg-5 col-md-5 col-12 order-lg-1 order-2">
            <div class="leftside w-100 h-100 d-flex justify-content-center align-items-center">
              <img src="images/covid.png" width="300" height="300">
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-12 order-lg-2 order-1">
            <div class="rightside mt-4 w-100 h-100 d-flex justify-content-center align-items-center">
                 <h1>Let's Stay Safe & Fight Together Against Cor<span class="coro"><img src="images/covid-main.png" width="100" height="100"></span>na Virus</h1>
            </div>
        </div>    
  </div>
</div>
      <!-- Total covid-19 data cases container -->
      <div class="container-fluid my-5 bg-light">
        <div class="row text-center">
            <div class="col-4 text-warning my-5">
                <h5>Confirmed</h5>
                <?php echo $total_case ?>
            </div>
             <div class="col-4 text-success my-5">
                <h5>Recoverd</h5>
                <?php echo $total_reco ?>
            </div>
             <div class="col-4 text-danger my-5">
                <h5>Death</h5>
                <?php echo $total_death ?>
            </div>
        </div>
      </div>
     
	<!-- Covid-19 data table counntries wise -->
     <div class="container-fluid">
         <div class="table-responsive">
           <table class="table">
             <thead class="thead-dark">
                 <tr>
                     <th scope="col">Countries</th>
                     <th scope="col">Confirmed</th>
                     <th scope="col">Recoverd</th>
                     <th scope="col">Death</th>
                 </tr>
             </thead>
             <tbody>
                <?php foreach ($json_world as $key => $value) { 
                         $increase = $value[$data_count]['confirmed'] - $value[$data_count_prev]['confirmed']
                    ?>
                    <tr>
                       <th><?php  echo $key; ?></th> 
                       <td><?php echo $value[$data_count]['confirmed']; ?>
                       <?php if($increase !=0 ){ ?>
                          <small class="text-danger"><i class="fa fa-arrow-up" aria-hidden="true"></i><?php echo $increase; ?></small> 
                        <?php } ?>
                       </td>
                       <td><?php echo $value[$data_count]['recovered']; ?></td>
                       <td><?php echo $value[$data_count]['deaths']; ?></td>
                    </tr>
                    
                <?php } ?>
              </tbody>
         </table>
         </div>
     </div>
     <footer class="footer mt-auto py-3 bg-light">
      <div class="container text-center">
        <span class="text-muted">Copyright &copy;2020 | Created By Deep Bag</span>
      </div>
    </footer>
</body>
</html>
