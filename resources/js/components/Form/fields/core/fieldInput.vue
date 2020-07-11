<template>
    <validation-provider rules="required" v-slot="{ errors }">
        <input
                :type="inputType"
                :value="value"
                class="form-control"
                @input="onInput"
                v-bind:class="{ 'is-invalid': errors.length}"
        />
        <span class="invalid-feedback">{{ errors[0] }}</span>
    </validation-provider>

</template>

<script>
    import abstractField from "../abstractField";
    import {ValidationProvider, extend} from "vee-validate";
    import { required } from 'vee-validate/dist/rules';
    extend('required', required);

    export default {
        mixins: [abstractField],
        computed: {
            inputType() {
                return this.schema.inputType;
            },
        },
        methods: {
            onInput($event) {
                this.value = $event.target.value;
                this.model[this.schema.model] = this.value;
            },
        },
        components: {
            ValidationProvider
        }
    }
</script>