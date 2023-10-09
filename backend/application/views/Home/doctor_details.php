
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
if (base_url() != current_url()) {
    ?>
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb "><!-- justify-content-center-->

            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php
            if (!empty($uri1) & empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1)."'>" . ucwords($title) . "</a></li>";
            } else {
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1)."'>" . ucwords($uri1) . "</a></li>";
            }
            if (!empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='".base_url('doctor-details/'.$uri2)."'>" . ucwords($title) . "</a></li>";
            }
            ?>

        </ol>
    </nav>
<?php } ?> 

<section
      id="slider"
      style="top: -110px; position: relative; margin-bottom: -170px;"
    >
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
          <div class="overlay"></div>
          <div  class="carousel-item active">
            <img

              src="<?php echo base_url(); ?>asset/frontend/images/doctor_background.png"
              class="d-block w-100"
              alt="..."
            />
            <div 
              class="carousel-caption"
              style="margin-bottom: -150px !important; "
            >
              <h1 class="display-5 animate__animated animate__fadeInUp">
                <strong style="font-weight: 600; margin-top: 90px !important"
                  >Doctor Appointments <br />
                  Booking</strong
                >
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Start:: Doctors -->
    <section id="doctor-profile">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="profile-card">
              <img
                src="<?php echo base_url() . $doctor['d_picture']; ?>" alt="<?php echo $doctor['d_name']; ?>"
                class="img-fluid doctor-img"
                
              />
              <h3 class="doctor-name"><?php echo $doctor['d_name']; ?></h3>
              <p class="descgnation"><?php echo $doctor['d_designation']; ?></p>
              <p class="descgnation-oc"><?php echo $doctor['dd_name']; ?></p>
              <button
                data-bs-toggle="modal"
                data-bs-target="#modalFullscreen"
                class="book-appointment-btn"
              >
                Book Appointment
              </button>
              <!-- Modal -->
              <div
                class="modal fade"
                id="modalFullscreen"
                tabindex="-1"
                aria-labelledby="modalFullscreenLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div
                      class="modal-header"
                      style="
                        background-image: linear-gradient(
                          274deg,
                          rgb(72, 198, 241) 0%,
                          rgb(110, 89, 166) 100%
                        );
                      "
                    >
                      <h1
                        class="modal-title fs-5 mx-5"
                        id="modalFullscreenLabel"
                      >
                        Book Appointment
                      </h1>
                      <button
                        type="button"
                        class="btn-close me-3 text-light"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row mt-4 mb-4">
                          <div class="col-md-12 d-flex">
                            <img
                              src="../labaidcancer/backend/uploads/doctor/b43be292f5abc7905782087583975f1d.jpg"
                              class="img-fluid"
                              alt="doctor name"
                              style="
                                width: 250px;
                                height: auto;
                                border-radius: 7px;
                                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                              "
                            />
                            <div class="ms-5">
                              <h4 style="color: purple">
                                Prof. Dr. AFM Anwar Hossain
                              </h4>
                              <h5>Senior Consultant</h5>
                              <h5 class="descgnation-oc">Surgical Oncology</h5>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <form class="row g-3">
                            <div class="col-md-6">
                              <label for="name" class="form-label"
                                >Full Name</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter Full name"
                              />
                            </div>
                            <div class="col-md-6">
                              <label for="email" class="form-label"
                                >Email</label
                              >
                              <input
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="email@example.com"
                              />
                            </div>
                            <div class="col-md-6">
                              <label for="gender" class="form-label"
                                >Your Gender</label
                              >
                              <select id="gender" class="form-select">
                                <option>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="district" class="form-label"
                                >District</label
                              >
                              <select id="district" class="form-select">
                                <option selected>Select District</option>
                                <option value="">Dhaka</option>
                                <option value="">Tangail</option>
                                <option value="">Manikganj</option>
                                <option value="">Faridpur</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="phone" class="form-label"
                                >Phone Number</label
                              >
                              <input
                                type="text"
                                inputmode="numeric"
                                class="form-control"
                                id="phone"
                                placeholder="Enter Valid Phone Number"
                              />
                            </div>
                            <div class="col-md-6">
                              <label for="date-of-birth" class="form-label"
                                >Date of Birth</label
                              >
                              <input
                                type="date"
                                class="form-control"
                                id="date-of-birth"
                              />
                            </div>
                            <div class="col-md-6">
                              <label for="appointment-date" class="form-label"
                                >Appointment Date</label
                              >
                              <input
                                type="date"
                                class="form-control"
                                id="appointment-date"
                              />
                            </div>
                            <div class="col-md-6">
                              <label for="remarks" class="form-label"
                                >Remarks</label
                              >
                              <textarea
                                name="remarks"
                                id="remarks"
                                class="form-control"
                                cols="30"
                                rows="5"
                              ></textarea>
                            </div>
                            <div
                              class="d-grid gap-2 d-md-flex justify-content-md-end mt-3"
                            >
                              <button
                                type="submit"
                                class="book-appointment-btn"
                              >
                                Submit Request
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="">
              <div class="biography">
                <h5>Biggraphy</h5>
                <p>
                  <?php echo $doctor['d_biography']; ?>
                </p>
              </div>
              <div class="education">
                <h5>Education</h5>
                <p>
                    <?php echo $doctor['d_education']; ?>
                </p>
              </div>
              <div class="work-sehedule">
                <h5>Work Sehedule</h5>
                <div class="sehedule-list">
                  <div class="shedule-date">Sunday 6 PM-8 PM</div>
                  <div class="shedule-date">Tuesday 6 PM-8 PM</div>
                  <div class="shedule-date">Thursday 6 PM-8 PM</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
