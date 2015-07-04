<h1 class="page-header">Dashboard</h1>
<div class="row">
  <div class="col-md-9 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">Dashboard</div>
      <div class="panel-body">
        <div class="list-group">

          <a href="#" class="list-group-item">
            <span class="badge"><?php echo $dashboard_info['no_projects']; ?></span>
            Total Projects
          </a>
          <a href="#" class="list-group-item">
            <span class="badge"><?php echo $dashboard_info['last_project_days']; ?> day(s) ago</span>
            A new project has been added
          </a>
          <!--          <a href="#" class="list-group-item">
                      <span class="badge">3</span>
                      Projects added this month
                    </a>-->
          <a href="#" class="list-group-item">
            <span class="badge"><?php echo $dashboard_info['no_vendors']; ?></span>
            Number of Vendors
          </a>
          <a href="#" class="list-group-item">
            <span class="badge"><?php echo $dashboard_info['no_pos']; ?></span>
            Total number of POs
          </a>

          <a href="#" class="list-group-item">
            <span class="badge"><?php echo $dashboard_info['last_po_days']; ?> day(s) ago</span>
            The new PO has been added
          </a>

        </div>
        <!--          <div class="text-right">
                    <a href="#">More Tasks</a>
                  </div>-->
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12" style="display: none;">
    <div class="panel panel-default">
      <div class="panel-heading">
        Recently added Projects
      </div> 
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>S No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Email ID.</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John</td>
                <td>Doe</td>
                <td>John15482</td>
                <td>name@site.com</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Kimsila</td>
                <td>Marriye</td>
                <td>Kim1425</td>
                <td>name@site.com</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Rossye</td>
                <td>Nermal</td>
                <td>Rossy1245</td>
                <td>name@site.com</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Richard</td>
                <td>Orieal</td>
                <td>Rich5685</td>
                <td>name@site.com</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Jacob</td>
                <td>Hielsar</td>
                <td>Jac4587</td>
                <td>name@site.com</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Wrapel</td>
                <td>Dere</td>
                <td>Wrap4585</td>
                <td>name@site.com</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>