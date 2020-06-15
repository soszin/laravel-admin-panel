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
                <vue-form-generator :schema="schema" :model="model" :options="formOptions"></vue-form-generator>
<!--                <form>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-md-2 col-form-label" for="input-id-1">E-mail</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <input class="form-control" id="input-id-1" type="text" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-md-2 col-form-label" for="input-email">Name</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <input class="form-control" id="input-email" type="text" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-md-2 col-form-label" for="input-id-2">Last name</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <input class="form-control" id="input-id-2" type="text" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-md-2 col-form-label" for="input-id-3">Password</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <input class="form-control" id="input-id-3" type="password" name="password" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group row">-->
<!--                            <label class="col-md-2 col-form-label" for="input-id-4">Password confirmation</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <input class="form-control" id="input-id-4" type="password" name="password_confirmation" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <div class="text-center">-->
<!--                        <button class="btn btn-primary" type="submit">Submit form</button>-->
<!--                    </div>-->
<!--                </form>-->
            </div>
        </div>
    </content-wrapper>
</template>

<script>
    import VueFormGenerator from 'vue-form-generator'
    import "vue-form-generator/dist/vfg-core.css";

    export default {
        data () {
            return {
                model: {
                    id: 1,
                    name: 'John Doe',
                    password: 'J0hnD03!x4',
                    skills: ['Javascript', 'VueJS'],
                    email: 'john.doe@gmail.com',
                    status: true
                },
                schema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'ID (disabled text field)',
                            model: 'id',
                            readonly: true,
                            disabled: true
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Name',
                            model: 'name',
                            placeholder: 'Your name',
                            featured: true,
                            required: true
                        },
                        {
                            type: 'input',
                            inputType: 'password',
                            label: 'Password',
                            model: 'password',
                            min: 6,
                            required: true,
                            hint: 'Minimum 6 characters',
                            validator: VueFormGenerator.validators.string
                        },
                        {
                            type: 'select',
                            label: 'Skills',
                            model: 'skills',
                            values: ['Javascript', 'VueJS', 'CSS3', 'HTML5']
                        },
                        {
                            type: 'input',
                            inputType: 'email',
                            label: 'E-mail',
                            model: 'email',
                            placeholder: 'User\'s e-mail address'
                        },
                        {
                            type: 'checkbox',
                            label: 'Status',
                            model: 'status',
                            default: true
                        }
                    ]
                },
                formOptions: {
                    validateAfterLoad: true,
                    validateAfterChanged: true,
                    validateAsync: true
                }
            }
        },
        components: {
            "vue-form-generator": VueFormGenerator.component
        },
    }
</script>