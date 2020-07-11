<template>
    <content-wrapper>
        <div class="content-heading">
            <div>Users
                <small>Dodaj nowego użytkownika</small>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header">Nowy użytkownik</div>
            <div class="card-body">
                <form v-on:submit="submitForm">
                    <fieldset v-for="field in schema">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">{{field.label}}</label>
                            <div class="col-md-10">
                                <field-input :model="model" :schema="field"></field-input>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </content-wrapper>
</template>

<script>
    import fieldInput from "@components/Form/fields/core/fieldInput";
    import { mapState, mapActions } from 'vuex'

    export default {
        computed: {
        },
        data () {
            return {
                model: {
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                },
                schema: {
                    name: {
                        inputType: "text",
                        label: "Name",
                        model: "name"
                    },
                    email: {
                        inputType: "text",
                        label: "E-mail",
                        model: "email"
                    },
                    password: {
                        inputType: "password",
                        label: "Password",
                        model: "password"
                    },
                    password_confirmation: {
                        inputType: "password",
                        label: "Password confirmation",
                        model: "password_confirmation"
                    },
                }
            }
        },
        methods: {
            ...mapActions({
                createUser: 'createUser'
            }),
            submitForm: async function () {
                await this.createUser(this.model);
                this.clearForm();
            },
            clearForm() {
                for (const property in this.model) {
                    this.model[property] = "";
                }
            }
        },
        components: {
            fieldInput
        }
    }
</script>