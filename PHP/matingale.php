<html>

<head>
  <title> Martingale Simulator</title>
</head>


<body>
<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST')
{
  $NumOfSim = $_POST['NumOfSim'];
  for ($i = 1; $i <= $NumOfSim; $i++)
  {
  
  $capital = $_POST['capital'];
  $ibet = $_POST['ibet'];
  $cbet = 0; $betNo = 1; $totalLoss = 0; $totalGoals;
  $cbet = $ibet;
    
    
  while ($capital >= $cbet)
  {
    $totalGoals = rand(0,1);

    if ($totalGoals == 0)
      {
        $capital = $capital - $cbet + ($cbet * 1.82);
        echo "WIN, Capital = $capital Bet amt = $cbet No. of bet = $betNo, $totalGoals </br>";
        $cbet = $ibet;
        $totalLoss = 0 ;
        $betNo++;
      }
    else
      {
        $capital = $capital - $cbet;
        $totalLoss = $totalLoss + $cbet;
        echo "LOSE, Capital = $capital Bet amt = $cbet No. of bet = $betNo, $totalGoals </br>";
        $cbet = 2 * $totalLoss;
        $betNo++;

      }
  }
    echo "END of $i </br></br></br>";
  }

}


else {
  echo '
  <form action="martingale.php" method="POST">
    Capital: <input name="capital" type="number">
    Initial Bet: <input name="ibet" type="number">
    No. of simulation: <input name="NumOfSim" type="number">
    <input type="submit" value="Simulate">
  </form>
  ' ;
}
