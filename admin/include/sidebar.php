<aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div v-if="adminDetails" class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="active">
                                <a  href="index.php" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboards</span>
                                </a>
                            </li>
                            <li v-if="adminDetails.level == 1">
                                <a href="admin.php" aria-expanded="false">
                                <i class="nav-icon ti ti-user"></i>
                                <span class="nav-title">Admin</span></a> 
                            </li>
                            <li>
                                <a href="user.php" aria-expanded="false">
                                <i class="nav-icon ti ti-user"></i>
                                <span class="nav-title">Staff</span></a> 
                            </li>
                            <li>
                                <a href="jobs.php" aria-expanded="false">
                                <i class="nav-icon ti ti-comment"></i>
                                <span class="nav-title">Jobs</span></a> 
                            </li>
                            <li>
                                <a href="staffAvaible.php" aria-expanded="false">
                                <i class="nav-icon ti ti-package"></i>
                                <span class="nav-title">Staff Avaliable Request</span></a> 
                            </li>
                            <li>
                                <a href="booking.php" aria-expanded="false">
                                <i class="nav-icon ti ti-calendar"></i>
                                <span class="nav-title">Booking</span></a> 
                            </li>
                            <li>
                                <a href="staffRequest.php" aria-expanded="false">
                                <i class="nav-icon ti ti-email"></i>
                                <span class="nav-title">Time Off Request</span></a> 
                            </li>
                            <li>
                                <a href="booking.php" aria-expanded="false" @click="logout()">
                                <i class="nav-icon ti ti-key"></i>
                                <span class="nav-title">Log Out</span></a> 
                            </li>
                            
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>