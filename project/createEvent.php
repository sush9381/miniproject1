<?php require('includes/head.php');
require('controllers/secure.php');

?>
    <!-- //header -->
    <!-- inner banner -->
    <div class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.php" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create Event</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="modal-body align-w3">
        <form action="controllers/createevent.php" method="post" class="p-sm-3" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Event name</label>
                <input type="text" class="form-control" placeholder="Event  name" name="ename" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Date</label>
                <input type="date" class="form-control" name="date" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Venue</label>
                <input type="text" class="form-control" placeholder="Event venue" name="venue" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price Per entry(in RS)</label>
                <input type="number" class="form-control" placeholder="30" name="price" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Event Details</label>
                <input type="text" class="form-control" placeholder="enter full details" name="details" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Logo/image of event</label>
                <input type="file" class="form-control" name="photo" id="recipient-name" required>
        
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sports Type</label>
                <select  name="Stype" id="stype1" onchange="myFunction()" required>
                    <option value="" >Select Sports Type</option>
                    <option value="cricket" >Cricket</option>
                    <option value="football">Football</option>
                    <option value="badminton">Badminton</option>
                    <option value="tennis">Tennis</option>
                    <option value="chess">Chess</option>
                    <option value="others">Others</option>
                </select>
                <input type="text" id="others" class="form-control" placeholder="Enter Sports Type" name="Stype1">
                    <script>
                    function myFunction() {
                      var x = document.getElementById("stype1").value;
                      var y = document.getElementById("others").value;
                      if (x == "others") {
                            document.getElementById("others").style.visibility = "visible";
                          } else {
                            document.getElementById("others").style.visibility = "hidden";
                            document.getElementById("others").value=null;
                          }
                  }
</script>
            </div>
<?php
//$Stype=$_POST['Stype'];
//var_dump($(('#stype1').val()));
//die();
?>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Create">
            </div>

        </form>
    </div>
    <!-- //login -->

<?php require('includes/foot.php');
?>