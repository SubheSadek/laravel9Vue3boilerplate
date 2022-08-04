<template>

   <Modal :loading="isLoading" width="600" footer-hide v-model="$store.state.isModal" draggable class-name="vertical-center-modal" scrollable title="Create Role">
   <div class="modal-body pt-0">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" class="form w-100">
            <div class="d-flex flex-column mb-15 fv-row">
                <FormItem class="form-label fs-6 fw-bolder text-dark" label="Role name" prop="name">
                    <Input v-model="formValidate.name" type="text" placeholder="Role name"
                        autocomplete="off"></Input>
                </FormItem>
            </div>
           <div class="modal-button">
                <Button @click="handleSubmit('formValidate')" size="large" :loading="isLoading" :disabled="isLoading" icon="md-add" type="primary">{{
                        isLoading ? 'Please wait . . .' : 'Save Address'
                }}</Button>
                <Button @click="handleReset('formValidate')" size="large" type="default">Reset</Button>
            </div>

        </Form>
        </div>
    </Modal>
</template>

<script>

export default {
    name : 'createOrEditModal',
    data() {
        const formValidate = {
            name : null,
        }
        const ruleValidate = {
            name : [
                { required : true, message : 'Please input name', trigger : 'blur' },
                { max : 255, message : 'Role name must not be greater than 255 characters long', trigger : 'blur'},
            ],
        }
        return {
            formValidate,
            ruleValidate,
        }
    },
    methods: {
        handleSubmit(name) {
            this.$refs[name].validate(async (valid) => {
                if (valid) {
                    this.isLoading = true;
                    const res = await this.callApi('POST', '/admin/roles', this.formValidate);
                    if (res.status == 200 || res.status == 201) {
                        this.$store.state.isModal = false;
                        this.$refs[name].resetFields();
                    }
                    this.isLoading = false;
                }
            })
        },

        handleReset (name) {
            this.$refs[name].resetFields();
        },

        pushOrUpdate(method, data, values) {
            if (method == 'POST') {
                this.companies.total++
                return this.companies.data.unshift(data);
            }
            this.editData.name = values.name

        }
    }
};
</script>

<style>

</style>
