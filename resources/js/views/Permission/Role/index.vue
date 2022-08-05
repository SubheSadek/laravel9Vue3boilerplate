<template>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">

            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Company Table</span>
                <span class="text-muted mt-1 fw-bold fs-7">Total Records : 00</span>
            </h3>

            <div class="d-flex align-items-center">
                <div class="position-relative w-md-400px me-md-2">
                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" @keyup="searchMethod(null)" @input="searchMethod('clear')"
                        class="form-control form-control-solid ps-10" v-model="search"
                        placeholder="Search by Company name" />
                </div>
                <div class="d-flex align-items-center">
                    <button @click="searchMethod(null)" type="submit" class="btn btn-primary me-5">
                        Search
                    </button>
                </div>
            </div>

            <div @click="$store.state.isModal = true" class="card-toolbar">
                <a href="#" class="btn btn-sm btn-light-primary">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    New Company</a>
            </div>
        </div>

        <div class="card-body py-3">

            <div class="table-responsive">
                <Transition>
                    <table class="table align-middle gs-0 gy-4">

                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-150px rounded-start">SL no.</th>
                                <th class="min-w-200px">Role</th>
                                <th class="min-w-100px text-end rounded-end"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(role, index) in roles.data" :key="(role.id)">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{
                                                    (roles.from ?
                                                        roles.from : 1) + index
                                            }}</a>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{
                                                    role.name
                                            }}</a>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-end">
                                    <a title="Edit" href="#"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a @click="deleteCompany(role.id)" title="Delete" href="#"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="currentColor" />
                                                <path opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                    fill="currentColor" />
                                                <path opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </Transition>
                <div v-if="!roles.total" class="no_data">
                    <h2>No Data Available</h2>
                </div>

                <Page style="text-align:center;" :total="100" show-sizer />
            </div>
        </div>
    </div>

    <createOrEditModal />


</template>

<script>
import createOrEditModal from './components/createOrEditModal.vue'
export default {
    name: 'index',
    components: {
        createOrEditModal
    },
    data() {
        return {
            roles: [],
            editData: null,
            search: '',
            page: 1,
        }
    },
    methods: {
        async getRoles() {

            // this.$store.state.isSearch = true;
            const res = await this.callApi('get', `/admin/roles?search=${this.search}&page=${this.page}`);
            if (res.status === 200) {
                this.roles = res.data;
            }
            // setTimeout(() => {
            //     this.$store.state.isSearch = false;
            // }, 200);
        },
        async deleteCompany(id) {
            let text = "Are u sure to delete this company info?";
            if (confirm(text) == true) {
                const res = await this.callApi('DELETE', `/roles/${id}`);
                if (res.status === 200) {
                    let arr = this.roles.data;
                    var index = arr.findIndex(function (company) {
                        return company.id === id;
                    })
                    if (index !== -1) arr.splice(index, 1);
                    this.roles.total--;
                }
            }
        },
        searchMethod(type) {
            if (type == 'clear' && this.search == '') {
                return this.getRoles()
            }
            else if (type == null && this.search) {
                this.getRoles();
            }
            return false;

        }
    },
    created() {
        this.getRoles();
    }
}
</script>

