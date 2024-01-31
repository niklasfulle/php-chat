<?php

include_once 'class_DbConfig.php';
class class_Spiele
{
  public $db;
  /*
  *
  */
  function __construct()
  {
    $this->db = new Class_DbConfig();
  }

  function Singelplayer()
  {
    $Username = $_SESSION["Benutzername"];
    $Userklasse = $_SESSION["BenutzerKlasse"];
    $Spielart = "1";


    $resultSpiel1 = $this->Spiel1check($Spielart);
    if ($resultSpiel1 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "1");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele11 = "
        <div id=Spiel11>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele11 = "
          <div id=Spiel11>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele11 = "
          <div id=Spiel11>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele11 = "

      ";
    }

    $resultSpiel2 = $this->Spiel2check($Spielart);
    if ($resultSpiel2 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "2");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele12 = "
        <div id=Spiel12>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele12 = "
          <div id=Spiel12>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele12 = "
          <div id=Spiel12>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele12 = "

      ";
    }

    $resultSpiel3 = $this->Spiel3check($Spielart);
    if ($resultSpiel3 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "3");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele13 = "
        <div id=Spiel13>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele13 = "
          <div id=Spiel13>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele13 = "
          <div id=Spiel13>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele13 = "

      ";
    }

    $resultSpiel4 = $this->Spiel4check($Spielart);
    if ($resultSpiel4 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "4");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele21 = "
        <div id=Spiel21>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele21 = "
          <div id=Spiel21>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele21 = "
          <div id=Spiel21>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele21 = "

      ";
    }

    $resultSpiel5 = $this->Spiel5check($Spielart);
    if ($resultSpiel5 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "5");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele22 = "
        <div id=Spiel22>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele22 = "
          <div id=Spiel22>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele22 = "
          <div id=Spiel22>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele22 = "

      ";
    }

    $resultSpiel6 = $this->Spiel6check($Spielart);
    if ($resultSpiel6 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "6");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele23 = "
        <div id=Spiel23>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele23 = "
          <div id=Spiel23>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele23 = "
          <div id=Spiel23>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele23 = "

      ";
    }

    $resultSpiel7 = $this->Spiel7check($Spielart);
    if ($resultSpiel7 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "7");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele31 = "
        <div id=Spiele31>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele31 = "
          <div id=Spiele31>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele31 = "
          <div id=Spiele31>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele31 = "

      ";
    }

    $resultSpiel8 = $this->Spiel8check($Spielart);
    if ($resultSpiel8 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "8");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele32 = "
        <div id=Spiele32>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele32 = "
          <div id=Spiele32>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele32 = "
          <div id=Spiele32>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele32 = "

      ";
    }

    $resultSpiel9 = $this->Spiel9check($Spielart);
    if ($resultSpiel9 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "9");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele33 = "
        <div id=Spiele33>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele33 = "
          <div id=Spiele33>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele33 = "
          <div id=Spiele33>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele33 = "

      ";
    }

    $resultSpiel10 = $this->Spiel10check($Spielart);
    if ($resultSpiel10 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "10");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele41 = "
        <div id=Spiele41>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele41 = "
          <div id=Spiele41>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele41 = "
          <div id=Spiele41>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele41 = "

      ";
    }

    $resultSpiel11 = $this->Spiel11check($Spielart);
    if ($resultSpiel11 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "11");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele42 = "
        <div id=Spiele42>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele42 = "
          <div id=Spiele42>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele42 = "
          <div id=Spiele42>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele42 = "

      ";
    }

    $resultSpiel12 = $this->Spiel12check($Spielart);
    if ($resultSpiel12 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "12");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele43 = "
        <div id=Spiele43>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele43 = "
          <div id=Spiele43>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele43 = "
          <div id=Spiele43>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele43 = "

      ";
    }

    $return = "
    $Spiele11
    $Spiele12
    $Spiele13
    $Spiele21
    $Spiele22
    $Spiele23
    $Spiele31
    $Spiele32
    $Spiele33
    $Spiele41
    $Spiele42
    $Spiele43
    ";
    return $return;
  }

  function Multilplayer()
  {
    $Username = $_SESSION["Benutzername"];
    $Userklasse = $_SESSION["BenutzerKlasse"];
    $Spielart = "2";

    $resultSpiel1 = $this->Spiel1check($Spielart);
    if ($resultSpiel1 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "1");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele11 = "
        <div id=Spiel11>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele11 = "
          <div id=Spiel11>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele11 = "
          <div id=Spiel11>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele11 = "

      ";
    }

    $resultSpiel2 = $this->Spiel2check($Spielart);
    if ($resultSpiel2 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "2");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele12 = "
        <div id=Spiel12>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele12 = "
          <div id=Spiel12>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele12 = "
          <div id=Spiel12>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele12 = "

      ";
    }

    $resultSpiel3 = $this->Spiel3check($Spielart);
    if ($resultSpiel3 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "3");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele13 = "
        <div id=Spiel13>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele13 = "
          <div id=Spiel13>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele13 = "
          <div id=Spiel13>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele13 = "

      ";
    }

    $resultSpiel4 = $this->Spiel4check($Spielart);
    if ($resultSpiel4 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "4");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele21 = "
        <div id=Spiel21>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele21 = "
          <div id=Spiel21>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele21 = "
          <div id=Spiel21>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele21 = "

      ";
    }

    $resultSpiel5 = $this->Spiel5check($Spielart);
    if ($resultSpiel5 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "5");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele22 = "
        <div id=Spiel22>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele22 = "
          <div id=Spiel22>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele22 = "
          <div id=Spiel22>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele22 = "

      ";
    }

    $resultSpiel6 = $this->Spiel6check($Spielart);
    if ($resultSpiel6 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "6");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele23 = "
        <div id=Spiel23>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele23 = "
          <div id=Spiel23>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele23 = "
          <div id=Spiel23>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele23 = "

      ";
    }

    $resultSpiel7 = $this->Spiel7check($Spielart);
    if ($resultSpiel7 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "7");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele31 = "
        <div id=Spiele31>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele31 = "
          <div id=Spiele31>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele31 = "
          <div id=Spiele31>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele31 = "

      ";
    }

    $resultSpiel8 = $this->Spiel8check($Spielart);
    if ($resultSpiel8 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "8");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele32 = "
        <div id=Spiele32>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele32 = "
          <div id=Spiele32>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele32 = "
          <div id=Spiele32>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele32 = "

      ";
    }

    $resultSpiel9 = $this->Spiel9check($Spielart);
    if ($resultSpiel9 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "9");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele33 = "
        <div id=Spiele33>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele33 = "
          <div id=Spiele33>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele33 = "
          <div id=Spiele33>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele33 = "

      ";
    }

    $resultSpiel10 = $this->Spiel10check($Spielart);
    if ($resultSpiel10 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "10");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele41 = "
        <div id=Spiele41>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele41 = "
          <div id=Spiele41>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele41 = "
          <div id=Spiele41>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele41 = "

      ";
    }

    $resultSpiel11 = $this->Spiel11check($Spielart);
    if ($resultSpiel11 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "11");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele42 = "
        <div id=Spiele42>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele42 = "
          <div id=Spiele42>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele42 = "
          <div id=Spiele42>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele42 = "

      ";
    }

    $resultSpiel12 = $this->Spiel12check($Spielart);
    if ($resultSpiel12 == "1") {
      $resultSpiele = $this->SpielSelectInfo($Spielart, "12");
      $row = $resultSpiele->fetch_row();
      if ($Userklasse == "2") { /*Admin*/
        $Spiele43 = "
        <div id=Spiele43>
          <a href=$row[1] id=SpieleLink>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </a>
        </div>
        ";
      }elseif ($Userklasse == "1") { /*User*/
        if ($row["3"] == "1") {
          $Spiele43 = "
          <div id=Spiele43>
            <a href=$row[1] id=SpieleLink>
              <h1 id=Spiele>$row[0]</h1>
              <div id=SpieleBeschreibung>
                  $row[2]
              </div>
            </a>
          </div>
          ";
        }elseif ($row["3"] == "0") {
          $Spiele43 = "
          <div id=Spiele43>
            <h1 id=Spiele>$row[0]</h1>
            <div id=SpieleBeschreibung>
                $row[2]
            </div>
          </div>
          ";
        }
      }
    }else {
      $Spiele43 = "

      ";
    }

    $return = "
    $Spiele11
    $Spiele12
    $Spiele13
    $Spiele21
    $Spiele22
    $Spiele23
    $Spiele31
    $Spiele32
    $Spiele33
    $Spiele41
    $Spiele42
    $Spiele43
    ";
    return $return;

  }

  function Spiel1check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 1 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 1 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel2check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 2 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 2 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel3check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 3 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 3 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel4check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 4 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 4 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel5check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 5 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 5 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel6check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 6 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 6 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel7check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 7 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 7 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel8check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 8 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 8 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel9check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 9 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 9 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel10check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 10 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 10 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel11check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 11 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 11 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function Spiel12check($Spielart)
  {
    if ($Spielart == "1") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 12 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }elseif ($Spielart == "2") {
      $SQL = "SELECT Name FROM `spiele` WHERE `SpielBereichNr` = 12 AND SpielTyp = $Spielart";

      $result = $this->db->db->query($SQL);

      if ($result->num_rows == "1") {
        $return = "1";
      }
    }

    return $return;
  }

  function SpielSelectInfo($Spielart, $SpielNr)
  {
    $SQL = "SELECT `Name`, `SpieleLink`, `Beschriebung`, `Status`, `SpielerAnzahl` FROM `spiele` WHERE `SpielBereichNr` = '$SpielNr' AND `SpielTyp` = '$Spielart'";

    $result = $this->db->db->query($SQL);

    if ($result->num_rows == "1") {
      return $result;
    }
  }

}
