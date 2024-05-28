<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php include 'includes/header_link.php'; ?>
    
    
  </head>
  <style>
    [v-cloak] {
      display: none;
    }
  </style>
  <body>
    <div id="user" v-cloak class="container-scroller">
      <?php include 'includes/sidebar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'includes/header.php'; ?>
        <div class="main-panel">
        <div class="hero">
          <div id="calendar"></div>
        </div>
        <!-- <div id="calendar"></div> -->
          <!-- <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Check out Your Rota for the Month </h3>
            </div> -->
              <!-- <div v-if="bookings" class="row">
                <div v-for="(item, index) in bookings" class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                  <div class="card bg-warning">
                    <div class="card-body px-3 py-4">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                          <p class="mb-0 color-card-head">{{item.days}}</p>
                          <h2 class="text-white"> {{item.staff_fullname}} - <span class="h5">{{item.work_hour}}</span>
                          </h2>
                        </div>
                      </div>
                      <h6 class="text-white">{{item.date}}</h6>
                    </div>
                  </div>
                </div>
              </div> -->
            <!-- </div>
          </div> -->
        </div>
      </div>
    </div>
    
    <?php include 'includes/footer_link.php'; ?>

    <script>

    $(document).ready(function () {
        $('#calendar').evoCalendar({
            theme: 'light',
            calendarEvents: [
                {
                    id: 'bHay68s',
                    
                    badge: "Full Day", // Event's ID (required)
                    name: "Tunde Kilani", // Event name (required)
                    date: "May/28/2024", // Event date (required)
                    type: "birthday", // Event type (required)
                    everyYear: true // Same event every year (optional)
                },
                {
                    id: 'bHay68s',
                    badge: "Full Day", // Event's ID (required)
                    name: "isaac Oluwaseun", // Event name (required)
                    date: "May/28/2024", // Event date (required)
                    type: "holiday", // Event type (required)
                    everyYear: true // Same event every year (optional)
                },
                {
                    id: 'bHay68s',
                    badge: "Full Day", // Event's ID (required)
                    name: "Jimoh Benjamin", // Event name (required)
                    date: "May/28/2024", // Event date (required)
                    type: "holiday", // Event type (required)
                    everyYear: true // Same event every year (optional)
                },
                {
                    name: "Vacation Leave",
                    badge: "02/13 - 02/15", // Event badge (optional)
                    date: ["February/13/2024", "February/15/2024"], // Date range
                    description: "Vacation leave for 3 days.", // Event description (optional)
                    type: "event",
                    color: "#63d867" // Event custom color (optional)
                }
            ]
        })
    })


</script>
  </body>
</html>