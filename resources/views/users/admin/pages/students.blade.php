@extends('components.template')
    @section('content')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="viewport-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">UI Elements</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tables</li>
              </ol>
            </nav>
          </div>
          <div class="content-viewport">
            <div class="row">
              <div class="col-lg-6">
                        
              <div class="col-lg-6">
                <div class="grid">
                  <p class="grid-header">Contextual Table</p>
                  <div class="item-wrapper">
                    <div class="table-responsive">
                      <table class="table info-table">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Profit</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="bg-success">
                            <td>Water Bottle</td>
                            <td>874</td>
                            <td>$546</td>
                            <td>43%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>Scissors</td>
                            <td>345</td>
                            <td>$124.99</td>
                            <td>31%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr class="bg-primary">
                            <td>Rulers</td>
                            <td>257</td>
                            <td>$78.50</td>
                            <td>28%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>Water Bottle</td>
                            <td>874</td>
                            <td>$546</td>
                            <td>43%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr class="bg-info">
                            <td>Water Bottle</td>
                            <td>874</td>
                            <td>$546</td>
                            <td>43%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td>White Board</td>
                            <td>24</td>
                            <td>$1244</td>
                            <td>56%</td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="grid">
                  <p class="grid-header">Image&Components Table</p>
                  <div class="item-wrapper">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>User</th>
                            <th>Progress</th>
                            <th>Earnings</th>
                            <th>Target</th>
                            <th>Points</th>
                            <th>Sales</th>
                            <th>Started</th>
                            <th>Deadline</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="d-flex align-items-center border-top-0">
                              <img class="profile-img img-sm img-rounded mr-2" src="../../../assets/images/profile/male/image_5.png" alt="profile image">
                              <span>Herman Beck</span>
                            </td>
                            <td>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$23,563</td>
                            <td>$30,000</td>
                            <td>3454</td>
                            <td class="text-success"> 15.67% <i class="mdi mdi-arrow-up"></i>
                            </td>
                            <td>Jul 12, 2019 </td>
                            <td>Jar 23, 2019 </td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="d-flex align-items-center">
                              <img class="profile-img img-sm img-rounded mr-2" src="../../../assets/images/profile/male/image_7.png" alt="profile image">
                              <span>Curtis Greer</span>
                            </td>
                            <td>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$14,435</td>
                            <td>$30,000</td>
                            <td>3454</td>
                            <td class="text-danger"> 23.05% <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td>Jul 12, 2019 </td>
                            <td> May 15, 2019 </td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="d-flex align-items-center">
                              <img class="profile-img img-sm img-rounded mr-2" src="../../../assets/images/profile/female/image_10.png" alt="profile image">
                              <span>Lettie Phillips</span>
                            </td>
                            <td>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$16,745</td>
                            <td>$30,000</td>
                            <td>3454</td>
                            <td class="text-success"> 23.05% <i class="mdi mdi-arrow-up"></i>
                            </td>
                            <td>Jul 12, 2019 </td>
                            <td> May 15, 2019 </td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="d-flex align-items-center">
                              <img class="profile-img img-sm img-rounded mr-2" src="../../../assets/images/profile/female/image_1.png" alt="profile image">
                              <span>Rachel Garza</span>
                            </td>
                            <td>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$34,546</td>
                            <td>$30,000</td>
                            <td>3454</td>
                            <td class="text-success"> 67.23% <i class="mdi mdi-arrow-up"></i>
                            </td>
                            <td>Jul 12, 2019 </td>
                            <td>Apr 06, 2019 </td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <tr>
                            <td class="d-flex align-items-center">
                              <img class="profile-img img-sm img-rounded mr-2" src="../../../assets/images/profile/male/image_3.png" alt="profile image">
                              <span>Estelle Guzman</span>
                            </td>
                            <td>
                              <div class="progress progress-slim">
                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$23,657</td>
                            <td>$30,000</td>
                            <td>3454</td>
                            <td class="text-danger"> 12.45% <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td>Jul 12, 2019 </td>
                            <td>Jul 12, 2019 </td>
                            <td class="actions">
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
              <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      @endsection      