<aside class="main-sidebar sidebar-dark-primary elev">
    <div class="sidebar">
        <nav class="mt-2">
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas">
                            <img src="{{ asset('dist/img/icons/edit.png') }}" style="width: 17px;" alt="">
                        </i>

                        <p>New
                            <i class="fas fa-angle-left right rotate90"></i>
                        </p>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item ">
                            <a href="#/employer" class="nav-link navLink" id="employer-anchor" data-link="employer">
                                <i class="far nav-icon">-</i>
                                <p>Add New Employer</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/personal-information" class="nav-link navLink" id="personal-information-anchor" data-link="personal-information">
                                <i class="far nav-icon">-</i>
                                <p>Add New Person Information</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/excel" class="nav-link navLink" id="excel-anchor" data-link="excel">
                                <i class="far nav-icon">-</i>
                                <p>Importing EXCEL Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas">
                            <img src="{{ asset('dist/img/icons/report.png') }}" style="width: 18px;" alt="">
                        </i>
                        <p> 
                            Monitoring Data
                            <i class="fas fa-angle-left right rotate90"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#/ExternalExposure" class="nav-link navLink" data-link="ExternalExposure">
                                <i class="far nav-icon">-</i>
                                <p>External Exposure</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#/InternalExposure" class="nav-link navLink" data-link="InternalExposure">
                                <i class="far nav-icon">-</i>
                                <p>Internal Exposure</p>
                            </a>
                        </li>            
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas ">
                            <img src="{{ asset('dist/img/icons/medical-record.png') }}" style="width: 17px;" alt="">
                        </i>
                        <p>
                            Test Report
                            <i class="right fas fa-angle-left rotate90"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#/PeriodicDose" class="nav-link navLink" data-link="PeriodicDose">
                                <i class="far nav-icon">-</i>
                                <p>Periodical Dose Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/InvestigationForm" class="nav-link navLink" data-link="InvestigationForm">
                                <i class="far nav-icon">-</i>
                                <p>Investigation Form for Dose Exc...</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/AnnualDose" class="nav-link navLink" data-link="AnnualDose">
                                <i class="far nav-icon">-</i>
                                <p>Annual Dose Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/IndividualDose" class="nav-link navLink"  data-link="IndividualDose">
                                <i class="far nav-icon">-</i>
                                <p>Individual Dose Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/DoseReport" class="nav-link navLink" data-link="DoseReport">
                                <i class="far nav-icon">-</i>
                                <p>Dose Report Header Customize</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas">
                            <img src="{{ asset('dist/img/icons/loupe.png') }}" style="width: 17px;" alt="">
                        </i>
                        <p>
                            Query
                            <i class="fas fa-angle-left right rotate90"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#/PersonalInformationQuery" class="nav-link" data-link="PersonalInformationQuery">
                                <i class="far nav-icon">-</i>
                                <p>Personal Information Query</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/BatchQuery" data-link="BatchQuery" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>Batch No. Query</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/InternalExposureQuery" class="nav-link" data-link="InternalExposureQuery">
                                <i class="far nav-icon">-</i>
                                <p>Internal Exposure Query</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/EmployerQuery" data-link="EmployerQuery" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>Employer Query</p>
                            </a>
                        </li>

                        <li class="nav-item"> 
                            <a href="#/ExportExcel" data-link="ExportExcel" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>Export Excel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas">
                            <img src="{{ asset('dist/img/icons/analytics.png') }}" style="width: 17px;" alt="">
                        </i>
                        <p>
                            Statistic
                            <i class="fas fa-angle-left right rotate90"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#/OverallPerformanceOccupation" data-link="OverallPerformanceOccupation" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>The overall performance of occupation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/DistributionOfOccupation" data-link="DistributionOfOccupation" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>The distribution of occupation</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/DistributionRatio" data-link="DistributionRatio" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>The distribution ratio of occupation</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#/AnnualDoseDistribution" data-link="AnnualDoseDistribution" class="nav-link">
                                <i class="far nav-icon">-</i>
                                <p>Annual dose distribution ratio fo..</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas">
                            <img src="{{ asset('dist/img/icons/gear.png') }}" style="width: 17px;"/>
                        </i>
                        <p>
                            System Management
                            <i class="fas fa-angle-left right rotate90"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#/ApprovedDSP" class="nav-link navLink" id="approvedDSP-anchor" data-link="approvedDSP">
                                <i class="far fa-circl nav-icon">-</i>
                                <p>Approved Dosimetric Service</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#/Dosimetric-System-Information" class="nav-link navLink" id="Dosimetric-System-Information-anchor"  data-link="Dosimetric-System-Information">
                                <i class="far fa-circl nav-icon">-</i>
                                <p>Dosimetric Systems Information</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul> --}}
        </nav>
    </div>
</aside>