<template>

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Management Create</h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create New Employee Form
                            <span style="float: right;">
                                <router-link :to="{ name: 'EmployeesIndex' }">
                                    Back
                                </router-link>
                            </span>
                            </div>
                        <div class="card-body">

                            <!-- Form -->
                            <form @submit.prevent="storeEmployee">
                                <!-- Name -->
                                <div class="form-group row">
                                    <label for="first_name"
                                    class="col-md-4 col-form-label text-md-right"
                                    >First Name
                                    </label>

                                    <div class="col-md-6">
                                        <input id="first_name"
                                        type="text"
                                        v-model="form.last_name"
                                        class="form-control"
                                        name="first_name"
                                        required
                                         />
                                    </div>
                                </div>

                                <!-- Middle Name -->
                                <div class="form-group row">
                                    <label for="middle_name"
                                    class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                    <div class="col-md-6">
                                        <input id="middle_name"
                                        type="text"
                                        v-model="form.middle_name"
                                        class="form-control"
                                        name="middle_name"
                                        required
                                        />
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last_name"
                                        type="text"
                                        v-model="form.last_name"
                                        class="form-control"
                                        name="last_name"
                                        value="" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                    <div class="col-md-6">
                                        <input id="address"
                                        type="text"
                                        v-model="form.address"
                                        class="form-control"
                                        name="address"
                                        value="" required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>


                                <!-- Country -->
                                <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">
                                        Country
                                    </label>

                                    <div class="col-md-6">
                                        <select
                                        v-model="form.country_id"
                                        @change="getStates()"
                                        name="country"
                                        class="form-control"
                                        aria-label="Default select example">

                                            <option v-for="country in countries"
                                            :key="country.id"
                                            :value="country.id"
                                            >{{ country.name }}</option>

                                        </select>
                                    </div>
                                </div>

                                 <!-- State -->
                                <div class="form-group row">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">
                                        State
                                    </label>

                                    <div class="col-md-6">
                                        <select
                                        v-model="form.state_id"
                                        @change="getCities()"
                                        name="state"
                                        class="form-control"
                                        aria-label="Default select example"
                                        >
                                            <option v-for="state in states"
                                            :key="state.id"
                                            :value="state.id"
                                            >
                                                {{ state.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                               <!-- City -->
                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">
                                        City
                                    </label>
                                    <div class="col-md-6">
                                        <select name="city"
                                        v-model="form.city_id"
                                        class="form-control"
                                        aria-label="Default select example">
                                            <option
                                            v-for="city in cities"
                                            :key="city.id"
                                            :value="city.id"
                                            >
                                            {{ city.name }}</option>
                                        </select>
                                    </div>
                                </div>


                                 <!-- Department -->
                                <div class="form-group row">
                                    <label for="department" class="col-md-4 col-form-label text-md-right">
                                        Department
                                    </label>
                                    <div class="col-md-6">
                                        <select name="department"
                                        v-model="form.department_id"
                                        class="form-control"
                                        aria-label="Default select example">

                                            <option
                                            v-for="department in departments"
                                            :key="department.id"
                                            :value="department.id">
                                            {{ department.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Zip Code -->
                                <div class="form-group row">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>

                                    <div class="col-md-6">
                                        <input id="zip_code"
                                        type="text"
                                        v-model="form.zip_code"
                                        class="form-control"
                                        name="zip_code"
                                        required>
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>

                                <!-- DatePicker -->
                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">Birth Date</label>

                                 <div class="col-md-6">
                                        <datepicker placeholder="Click to Select Birth Date"
                                            v-model="form.birthdate"
                                            input-class="form-control">
                                        </datepicker>
                                    </div>
                                </div>

                                <!-- Date Hired -->
                                <div class="form-group row">
                                    <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date Hired</label>

                                 <div class="col-md-6">
                                        <datepicker
                                            placeholder="Click to Select Date Hired"
                                            v-model="form.date_hired"
                                            input-class="form-control">
                                        </datepicker>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Employee
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import Datepicker from 'vuejs-datepicker';
export default {
    components: {
    Datepicker
  },

  data(){
      return {
          countries: [],
          states: [],
          departments: [],
          cities: [],

            form: {
                first_name: '',
                last_name: '',
                middle_name: '',
                address: '',
                country_id: '',
                state_id: '',
                department_id: '',
                city_id: '',
                zip_code: '',
                birthdate: null,
                date_hired: null,
          }
      };
  },

  created(){
      this.getCountries();
      this.getDepartments();
  },

  methods: {
      getCountries(){
          axios
          .get('/api/employees/countries')
          .then(res => {
              this.countries = res.data
          }).catch(error => {
              console.log(console.error)
          });
      },

        getStates(){
          axios
          .get('/api/employees/' + this.form.country_id + '/states')
          .then(res => {
              this.states = res.data
          }).catch(error => {
              console.log(console.error)
          });
      },

        getCities(){
          axios
          .get('/api/employees/' + this.form.state_id + '/cities')
          .then(res => {
              this.cities = res.data
          }).catch(error => {
              console.log(console.error)
          })
      },

        getDepartments(){
          axios
          .get('/api/employees/departments')
          .then(res => {
              this.departments = res.data
          }).catch(error => {
              console.log(console.error)
          })
      },

      storeEmployee(){
          axios
          .post('/api/employees', {
              first_name: this.form.first_name,
              middle_name: this.form.middle_name,
              last_name: this.form.last_name,
              address: this.form.address,
              country_id: this.form.country_id,
              state_id: this.form.state_id,
              city_id: this.form.city_id,
              department_id: this.form.department_id,
              zip_code: this.zip_code,
              birthdate: this.birthdate,
              date_hired: this.date_hired,
          }).then(res => {
              console.log(res);
          })
      }
  }
}
</script>