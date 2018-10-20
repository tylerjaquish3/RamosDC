<?php
session_start();

if (!isset($_SESSION["username"])) {
    header('location:index.html');
}

include 'config/datalogin.php';
include 'config/functions.php';
include 'admin-header.php';

?>

<div id="content">
  <div class="outer text-center">
    <div class="inner bg-light lter row">
      <div class="col-xs-12 col-md-6">

        <h1>Web Stats provided by Piwik</h1>
        <h4><a href="http://ramosdc.com/analytics/piwik/" target="_blank">View more statistics</a></h4>

        <?php

          $token_auth = 'e03c1a6b54577a89bbf721276bd6cde7';

          // Monthly Visits

          $url = "http://ramosdc.com/analytics/piwik";
          $url .= "?module=API&method=VisitsSummary.get";
          $url .= "&idSite=1&period=month&date=yesterday";
          $url .= "&format=PHP&filter_limit=20";
          $url .= "&token_auth=".$token_auth;

          $fetched = file_get_contents($url);
          $content = unserialize($fetched);

          // case error
          if (!$content) {
            print("An error occurred, please contact your Administrator.");
              //print("Error, content fetched = " . $fetched);
          } else {
            ?>
            <table class="statsTable" id="monthlyVisits">
              <caption>Visits This Month</caption>
              <tr>
                <th>Visitors</th><th>Unique Visitors</th><th>Actions</th><th>Avg. Time</th>
              </tr>
              <tr>
                <td><?php echo $content['nb_visits']; ?></td>
                <td><?php echo $content['nb_uniq_visitors']; ?></td>
                <td><?php echo $content['nb_actions']; ?></td>
                <td><?php echo $content['avg_time_on_site']; ?> secs.</td>
              </tr>
            </table>
            <?php
          }

          //var_dump($content);

          // Yearly Visits

          $url = "http://ramosdc.com/analytics/piwik";
          $url .= "?module=API&method=VisitsSummary.get";
          $url .= "&idSite=1&period=year&date=yesterday";
          $url .= "&format=PHP&filter_limit=20";
          $url .= "&token_auth=".$token_auth;

          $fetched = file_get_contents($url);
          $content = unserialize($fetched);

          // case error
          if (!$content) {
            print("An error occurred, please contact your Administrator.");
              //print("Error, content fetched = " . $fetched);
          } else {
            ?>
            <table class="statsTable" id="yearlyVisits">
              <caption>Visits This Year</caption>
              <tr>
                <th>Visitors</th><th>Actions</th><th>Avg. Time</th>
              </tr>
              <tr>
                <td><?php echo $content['nb_visits']; ?></td>
                <td><?php echo $content['nb_actions']; ?></td>
                <td><?php echo $content['avg_time_on_site']; ?> secs.</td>
              </tr>
            </table>
            <?php
          }

          //var_dump($content);
        ?>
      </div>
      <div class="col-xs-12 col-md-6 text-center">
        <?php

          // Referers

          $url = "http://ramosdc.com/analytics/piwik";
          $url .= "?module=API&method=Referrers.getAll";
          $url .= "&idSite=1&period=year&date=yesterday";
          $url .= "&format=PHP&filter_limit=20";
          $url .= "&token_auth=".$token_auth;

          $fetched = file_get_contents($url);
          $content = unserialize($fetched);

          // case error
          if (!$content) {
            print("An error occurred, please contact your Administrator.");
              //print("Error, content fetched = " . $fetched);
          } else {
            ?>
            <table class="statsTable" id="referers">
              <caption>Top Referers</caption>
              <tr>
                <th>Visits</th><th>URL / Search</th><th>Type</th>
              </tr>
              <?php 
              foreach ($content as $referer) {
              ?>
                <tr>
                  <td><?php echo $referer['nb_visits']; ?></td>
                  <td><?php echo $referer['label']; ?></td>
                  <td>
                  <?php 
                  if ($referer['referer_type'] == 1)
                    echo "Direct";
                  else if ($referer['referer_type'] == 2)
                    echo "Search";
                  else if ($referer['referer_type'] == 3)
                    echo "Website";
                  else
                    echo "Campaign";
                  ?>
                    
                  </td>
                </tr>
              <?php } ?>
            </table>
            <?php
          }

          //var_dump($content);

        ?>
        </div>
        <div class="col-xs-12 text-center hourlyVisits">
        <?php

          // Hourly visits

          $url = "http://ramosdc.com/analytics/piwik";
          $url .= "?module=API&method=VisitTime.getVisitInformationPerLocalTime";
          $url .= "&idSite=1&period=year&date=yesterday";
          $url .= "&format=PHP&filter_limit=25";
          $url .= "&token_auth=".$token_auth;

          $fetched = file_get_contents($url);
          $content = unserialize($fetched);

          // case error
          if (!$content) {
            print("An error occurred, please contact your Administrator.");
              //print("Error, content fetched = " . $fetched);
          } else {
            ?>
            <table class="statsTable" id="hourlyVisits">
              <caption>Visits by Hour</caption>
              <tr>
                <?php for ($i=0; $i<24; $i++) { 
                  echo '<th>'.$i.'</th>';
                }
                ?>
              </tr>
              <tr>
              <?php foreach ($content as $hour) { ?>
                  <td><?php echo $hour['nb_visits']; ?></td>
              <?php } ?>
              </tr>
            </table>
            <?php
          }

          //var_dump($content);
          
          ?>

          <div class="definitions">
            <ul>
              <h3>Definitions</h3>
              <li><b>Visitors</b> - all visitors that visited your website</li>
              <li><b>Unique Visitors</b> - removes any repeat customers from all Visitors</li>
              <li><b>Actions</b> - count of total number of clicks within your website</li>
              <li><b>Avg. Time</b> - Average number of seconds spent on your website</li>
              <li><b>Referers</b> - how visitors found your website</li>
              <li><b>Hours (0-23)</b> - total number of visits in the corresponding hour of day (military time)</li>
            </ul>
          </div>

        </div>

      </div>
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.outer -->
</div>
<!-- /#content -->
      
<?php
include 'admin-footer.html';
?>  
   
    
