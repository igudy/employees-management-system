<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->

      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Employees Management</h1>
      </div>

        <div class="card">
            <div class="alert alert-success"></div>
          <div class="card-body">
              <div class="card-header">
              <form>
                <div class="input-group rounded">
                  <input type="search" name="search" class="form-control rounded" placeholder="Search Employee" aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>

            <br>
              <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary btn-block"  >
                Create
              </router-link>
                  <br>
            </div>

              <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                          <tr>
                              <td scope="row"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" class="btn btn-success">Edit</a>
                              </td>
                              <td>
                                <form>

                                  <button class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                          </tr>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
</template>

<script>
export default {

}
</script>