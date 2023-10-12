
<section
      id="slider"
      style="top: -110px; position: relative; margin-bottom: -170px"
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
          <div class="carousel-item active">
            <img
            src="<?php echo base_url(); ?>asset/frontend/images/doctor_background.png"
              class="d-block w-100"
              alt="..."
            />
            <div
              class="carousel-caption"
              style="margin-bottom: -150px !important"
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
      <div class="container py-5">
        <div class="row">
          <div class="col-md-4 col-sm-12 my-3">
            <div class="profile">
              <img
                src="<?php echo base_url() . $doctor['d_picture']; ?>"
                class="img-fluid"
                alt=""
              />
              <div class="profile-content">
                <h6 class="doctor-name"><?php echo $doctor['d_name']; ?></h6>
                <p
                  style="
                    font-weight: 600;
                    padding-bottom: 0px;
                    margin-bottom: 0px;
                  "
                >
                <?php echo $doctor['d_designation']; ?>
                </p>
                <p class="text-info"><?php echo $doctor['dd_name']; ?></p>
                
                <a href="<?php echo base_url('doctor-appointment/' . $doctor['d_slug']); ?>">
                <button
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  class="book-appointment-btn"
                >
                  Book Appointment
                </button>
                </a>
                
              </div>
            </div>
            <div class="modal fade" id="exampleModal">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header" style="background: linear-gradient(
                    189deg,
                    rgba(73, 194, 238, 0.2) 13.48%,
                    rgba(108, 92, 168, 0.2) 87.25%
                  )">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                      Book Appointment
                    </h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12 d-flex">
                          <img
                            src="./images/b43be292f5abc7905782087583975f1d (1).png"
                            class="img-fluid"
                            alt="doctor name"
                          />
                          <div class="ms-2 mt-5">
                            <h5 style="color: purple">
                                <?php echo $doctor['d_name']; ?>
                            </h5>
                            <h6><?php echo $doctor['d_designation']; ?></h6>
                            <h6 class="text-info"><?php echo $doctor['dd_name']; ?></h6>
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
                            <label for="email" class="form-label">Email</label>
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
                            <button type="submit" class="book-appointment-btn">
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
          <div class="col-md-8 mt-5 col-sm-12 my-3">
            <div class="about-doctor">
              <div class="biography">
                <h5 class="about-doctor-title">Biography</h5>
                <p>
                <?php echo $doctor['d_biography']; ?>
                </p>
              </div>
              <div class="education">
                <h5 class="about-doctor-title">Education</h5>
                <p>
                <?php echo $doctor['d_education']; ?>
                </p>
              </div>
              <div class="work-sehedule">
                <h5 class="about-doctor-title">Work Schedule</h5>
                <div class="sehedule-list">
                <?php foreach ($doctor_wh as $val): ?>
                    <div class="shedule-date"><span><?php echo $val->working_days; ?></span> <span style="text-wrap: nowrap;"><?php echo $val->working_from."-".$val->working_to; ?></span></div>
                <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>