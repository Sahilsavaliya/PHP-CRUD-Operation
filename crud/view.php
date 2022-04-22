<!DOCTYPE html>
<html lang="en">

<head>
<script>
function deletere(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText==1)
        { 
            document.getElementById("txtHint").innerHTML = "Record deleted successfully";
            setInterval('window.location.reload()', 4000);
        }
        else
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }

      }
    };
    xmlhttp.open("GET", "delete.php?id=" + id, true);
    xmlhttp.send();
  }
}
</script>

</script>

    <script defer="" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0cmFja3MlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyVGFibGUlMjAwNiUyMiUyQyUyMnclMjIlM0ExNTM2JTJDJTIyaCUyMiUzQTg2NCUyQyUyMmolMjIlM0E3NTQlMkMlMjJlJTIyJTNBMTUzNiUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZib290c3RyYXAlMkZ0YWJsZS0wNiUyRiUyMiUyQyUyMnIlMjIlM0ElMjIlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTMzMCU3RA=="></script>
    <script nonce="0dbb1351-023f-4476-8b7a-600fccbf984e">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.track = (e, t) => {
                    for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                    a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                }, a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
    <title>View Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.q2AVU534B4.css">
    <style>
        .tabcon {
            padding: 8px;
            text-align: left;
        }
    </style>

</head>

<body>
<?php
    include 'dbconnect1.php';
    session_start();
    $query="SELECT * FROM table1";
    $result=mysqli_query($conn,$query);

    ?>

<h1 style="text-align: center;"> Display Records </h1><br>
<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="table-wrap">
                        <table class="table" width="100%">
                            <thead class="thead-primary">
                                <tr>
                                    
                                    <td class="tabcon"><b>ID</b></td>
                                    <td class="tabcon"><b>FirstName</b></td>
                                    <td class="tabcon"><b>LastName</b></td>
                                    <td class="tabcon"><b>Gender</b></td>
                                    <td class="tabcon"><b>Contact</b></td>
                                    <td class="tabcon"><b>Email Address</b></td>
                                    <td class="tabcon"><b>Designation</b></td>
                                    <td class="tabcon"><b>Age</b></td>
                                    <td class="tabcon"><b>Password</b></td>
                                    <td class="tabcon"><b>file</b></td>
                                    <td class="tabcon"><b>Country</b></td>
                                    <td class="tabcon"><b>Update</b></td>
                                    <td class="tabcon"><b>Delete</b></td>
                                    
                                    <?php
                                    // session_start();
                                    if (mysqli_num_rows($result) > 0) {
                                        //echo "true..";
                                        while ($row = mysqli_fetch_assoc($result)) {



                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert" role="alert">


                                    <td class="tabcon"><?php echo $row['id'] ?></td>
                                    <td class="tabcon"><?php echo $row['fname'] ?></td>
                                    <td class="tabcon"><?php echo $row['lname'] ?></td>
                                    <td class="tabcon"><?php echo $row['gender'] ?></td>
                                    <td class="tabcon"><?php echo $row['contact'] ?></td>
                                    <td class="tabcon"><?php echo $row['email'] ?></td>
                                    <td class="tabcon"><?php echo $row['designation'] ?></td>
                                    <td class="tabcon"><?php echo $row['age'] ?></td>
                                    <td class="tabcon"><?php echo $row['password'] ?></td>
                                    <td class="tabcon"><?php echo $row['file'] ?></td> 
                                    <td class="tabcon"><?php echo $row['country'] ?></td>
                                    <td class="tabcon"><a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit"><button style="background-color: skyblue;">Edit</button></a></td>
                                    <td class="tabcon"><a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete"><button style="background-color: red;">Delete</button></a></td>




                                </tr>
                            </tbody>
                            </tr>

                    <?php
                                        }
                                    } else {
                                        echo "0 row found...";
                                    }
                    ?>
                        </table>
                        <?php
$thelist = "";
  if ($handle = opendir('upload')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><p>Download file <a href="download.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<li><p>Delete file <a href="deletefile.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<p>--------------------------------------';
      }
    }
    closedir($handle);
  }
?>
<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon="{&quot;rayId&quot;:&quot;6f150a492c2e8af3&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2021.12.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body>

</html>