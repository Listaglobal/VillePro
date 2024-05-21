

const urlPath = window.location.pathname.split("/");
const length = urlPath.length;
const webPage = urlPath[length - 1];

let getUrlParams = new URLSearchParams(window.location.search);

const getFileExtension = (filename) => {

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

var today = new Date()
let curentYearMonth = today.getFullYear() + "-" + today.getMonth() + 1;


let app = Vue.createApp({
    data() {
        return {
            // General utilites
            generalFunctions: new GeneralFunction({ apiPath: "admin" , logoutUrl : "login.php" }),
            images: null,
            loading: null,
            currentPage: null,
            currentExportPage: null,
            totalData: null,
            totalPage: null,
            per_page: 10,
            exportPer_page: 100,
            totalExportPage: null,
            class_active: null,
            reset_token: null,
            search: null,
            sort: null,
            sortValue: "",
            discoValue: "",
            // baseUrl:'',
            baseUrl: 'http://localhost/dorchester_consultancy/',
            first_name: null,
            last_name: null,
            gender: null,
            address: null,
            occupation_or_work: null,
            total_payment: null,
            no_of_people: null,
            imagefile: null,
            itemDetails: null,
            imageSent: null,
            pathname: null,
            success: null,
            daily: null,
            weekly: null,
            monthly: null,
            location: null,
            team: null,
            locations: null,
            job: null,
            message: null,
            availability: null,
            skills: null,

            // login details
            email: null,
            password: null,
            confirm_password: null,
            username: null,
            name: null,
            token: null,
            adminDetails: null,
            superAdmin: null,
            admin_initials: null,
            admin_level: null,

            //jobs
            jobs: null,
            name : null,
            details : null,
            locations : null,

            // staff
            staff: null,

            //booking 
            bookings: null,
            user_id: null,
            admin_id: null,
            jobs_id: null,


        }
    },
    methods: {
        //general utilities
        getToken() {
            const token = window.localStorage.getItem("token");
            this.token = (token) ? token : null;
        },
        logout() {
            window.localStorage.removeItem("token");
            window.location = this.baseUrl + "login.php";
        },
        async nextPage() {
            this.currentPage = parseInt(this.currentPage) + 1;
            this.totalData = null;
            this.totalPage = null;
        },
        async previousPage() {
            this.currentPage = parseInt(this.currentPage) - 1;
            this.totalData = null;
            this.totalPage = null;
        },
        async setNoPerPage(no) {
            this.per_page = no;
            this.class_active = true;
        },
        async getIndex(index) {

        },
        async getItemIndex(index) {

        },
        swalToast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: false,
            })
            Toast.fire({
                icon: icon,
                title: title
            })
        },
        async uploadImage(event) {
            this.imageSent = event.target.files[0];
        },

        async onLoading() {
            this.loading = true;
        },
        async onCompleted() {
            this.loading = false;
        },
        async onSuccess(successText, successData) {
            this.generalFunctions.swalToast('success', successText);
        },

        async onError(error) {
            this.generalFunctions.swalToast('error', error);
        },

        async callPostRequest(data, url, headers, onSuccess, canNavOn401 = 1) {
            let responseData = await this.generalFunctions.postRequest(data, url, headers, this.onLoading, this.onCompleted, (successStatus, success, successData) => {
                this.onSuccess(success, successData);
                if (typeof onSuccess === 'function') {
                    onSuccess(successStatus, successData);
                }
            }, this.onError, canNavOn401);
        },

        async callGetRequest( url, headers, onSuccess, showToast = 1){
            let responseData = await this.generalFunctions.getRequest(url, headers, this.onLoading, this.onCompleted, (successStatus, success, successData) =>{
                // if ( showToast == 1 ) this.onSuccess(success, successData);
                if ( typeof onSuccess === 'function' ) {
                    onSuccess(successStatus, successData);
                }
            }, this.onError);
        },


        // AUTH
        async Login() {
           
            if (!this.email || !this.password) {
                this.generalFunctions.swalToast("error", "Kindly Enter all Fields")
                return
            }
            const url = `auth/login.php`;
            let data = {
                "email": this.email,
                "password": this.password,
            };
            let headers = {
                "Content-type": "application/json",
            };
            await this.callPostRequest(data, url, headers, (successStatus, successData) => {
                if (!successData) {
                    return;
                }
                let token = successData.token;
                window.localStorage.setItem("token", token);
                window.location = `${this.baseUrl}admin/index.php`;
            }, 2);
        },

        //contact us
        async sbtContactForm(){
            
            if (!this.email || !this.phoneNumber || !this.message || !this.name || !this.location || !this.team) {
                this.generalFunctions.Toastinator("error","Kindly Enter all Fields")
                return
            }
            const url = `joinUs.php`;
            let data = {
                "email": this.email,
                "phone": this.phoneNumber,
                "location": this.location,
                "message" : this.message,
                "team": this.team,
                "name": this.name
            };
            let headers = {
                "Content-type": "application/json",
            };
            let responseData = await this.callPostRequest(data, url, headers, ( successStatus, successData) => {
                if ( !successData ){
                   return; 
                }
                window.location = `${this.baseUrl}index.php`;
                this.email = this.phoneNumber = this.message = this.name = null;
                
            }, 1);
        },

        //Staff 
        async getAllStaff(load = 1) {
            const url = `staff/getAllStaff.php`;
            let headers = {
              "Content-type": "application/json",
              "Authorization": `Bearer ${this.token}`
            };

            await this.callGetRequest(url, headers, (successStatus, successData) => {

            if (!successData) {
                return;
            }
              this.staff = successData.staff;
          });
        },

        async addStaff() {
            let data = {
                "name" : this.name,
                "image" : this.imageSent,
                "phoneNumber" : this.phoneNumber,
                "location": this.location,
                "skills": this.skills,
                "availability": this.availability,
                "email": this.email,
                "password": this.password
            }

                
            const url = `staff/addStaff.php`;

            const headers = {
                "Authorization": `Bearer ${this.token}`
            }

            await this.callPostRequest(data, url, headers, async (successStatus, successData) => {
                if (successStatus) {
                    await this.getAllStaff();
                    document.getElementById("_closedisco").click();
                    this.name = this.imageSent = this.phoneNumber = this.location = this.skills = this.availability = this.email = this.password = null;
                } 
            }, 2);
        },

        //booking 
        async getAllBooking(load = 1) {
            const url = `booking/getAllBooking.php`;
            let headers = {
              "Content-type": "application/json",
              "Authorization": `Bearer ${this.token}`
            };

            await this.callGetRequest(url, headers, (successStatus, successData) => {

            if (!successData) {
                return;
            }
              this.bookings = successData.bookings;
            })

        },

        async requestShift() {
            let data = {
                "user_id" : this.user_id,
                "jobs_id" : this.jobs_id
            }
            const url = `booking/scheduleShift.php`;

            const headers = {
                "Authorization": `Bearer ${this.token}`
            }

            await this.callPostRequest(data, url, headers, async (successStatus, successData) => {
                if (successStatus) {
                    window.location.reload();
                    await this.getAllBooking();
                    document.getElementById("_closedisco").click();
                    this.user_id = this.admin_id = this.jobs_id = null;
                } 
            }, 2);
        },

        // jobs
        async getAllJobs(load = 1) {
            const url = `jobs/getAllJobs.php`;
            let headers = {
              "Content-type": "application/json",
              "Authorization": `Bearer ${this.token}`
            };

          await this.callGetRequest(url, headers, (successStatus, successData) => {

              if (!successData) {
                  return;
              }
              this.jobs = successData.jobs;
          });
        },

        async addJobs() {
            if( !this.name || !this.details || !this.locations ){
                this.generalFunctions.swalToast("error","Kindly Enter all Fields")
                return
            }
            let data = {
                // "admin_id" : this.admin_id,
                "name" : this.name,
                "details" : this.details,
                "location" : this.locations,            
            }

            const url = `jobs/addJobs.php`;

            const headers = {
                "Authorization": `Bearer ${this.token}`
            }

            await this.callPostRequest(data, url, headers, async (successStatus, successData) => {
                if (successStatus) {
                    await this.getAllJobs();
                    document.getElementById("_closedisco").click();
                    this.name = this.details = this.locations = null;
                } 
            }, 2);
        },

        async RequestedBooking() {
           console.log({
            "name" : this.name,
            "file" : this.imageSent,
            "resume" : this.imageSent,
            "email" : this.email,
            "location" : this.locations, 
            "job" : this.job,
            "phone" : this.phoneNumber,
            "message" : this.message,
            "availability" : this.availability

        })
            if( !this.name || !this.email || !this.locations || !this.phoneNumber || !this.message || !this.availability ){
                this.generalFunctions.swalToast("error","Kindly Enter all Fields")
                return
            }
            let data = {
                "name" : this.name,
                "file" : this.imageSent,
                "resume" : this.imageSent,
                "email" : this.email,
                "location" : this.locations, 
                "job" : this.job,
                "phone" : this.phoneNumber,
                "message" : this.message,
                "availability" : this.availability

            }

            const url = `booking/requestJob.php`;

            const headers = {
                "Authorization": `Bearer ${this.token}`
            }

            await this.callPostRequest(data, url, headers, async (successStatus, successData) => {
                if (successStatus) {
                    await this.getAllJobs();
                    window.location = `${this.baseUrl}index.php`;
                    this.name = this.imageSent = this.email = this.locations = this.job = this.phoneNumber = this.message = null;
                } 
            }, 2);
        },

        // staff
        async getAllStaff(load = 1) {
            let search = (this.search) ? `&search=${this.search}` : "";
            let page = (this.currentPage) ? this.currentPage : 1;
            let per_page = (this.per_page) ? this.per_page : 20;
            let limit = (this.limit) ? `&limit=${this.limit}` : '';
            const url = `staff/getAllStaff.php?page=${page}&per_page=${per_page}${search}${limit}`;
            let headers = {
                "Content-type": "application/json",
                "Authorization": `Bearer ${this.token}`
            };

            await this.callGetRequest(url, headers, (successStatus, successData) => {

                if (!successData) {
                    return;
                }
                this.staff = successData.staff;
                this.currentPage = successData.page;
                this.totalPage = successData.totalPage;
                this.per_page = successData.per_page;
                this.totalData = successData.total_data;

            });
        },
        
    },
    async beforeMount() {
        this.pathname = window.location.href;
        if (!webPage.includes("login.php") && !webPage.includes("login")) {
            window.localStorage.setItem("dorchesterServicesCurrentPage", webPage);
            this.loading = true;
            this.getToken();
            // this.getAdminDetails();
            if (!this.token) {
                window.location = `${this.baseUrl}login.php`;
            }
        }

        
    },
    async mounted() {
        if (webPage === 'index.php' || webPage === 'index' || webPage === '') {
            
        }

        if (webPage === 'jobs.php' || webPage === 'jobs') {
            await this.getAllJobs();
        }

        if (webPage === 'vancacy.php' || webPage === 'vancacy') {
            await this.getAllJobs();
        }

        if (webPage === 'booking.php' || webPage === 'booking') {
            await this.getAllBooking();
            await this.getAllStaff();
            await this.getAllJobs();
        }
        
        if (webPage === 'user.php' || webPage === 'user') {
            await this.getAllStaff();
        }


        
        
    }
})

app.mount("#admin");
