import {get as objGet} from "lodash";

export default {
    props: ["model", "schema"],
    computed: {
        value: {
            get() {
                return objGet(this.model, this.schema.model)
            },
            set(newValue) {
                this.model[this.schema.model] = newValue;
            }
        }
    }
}