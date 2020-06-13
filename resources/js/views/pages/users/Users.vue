<template>
    <content-wrapper>
        <div class="content-heading">
            <div>Users</div>
        </div>
        <vuetable ref="vuetable"
                  api-url="https://vuetable.ratiw.net/api/users"
                  :fields="['name', 'nickname', 'email', 'gender']"
                  :css="css.table"
        ></vuetable>
    </content-wrapper>
</template>

<script>
    import Vuetable from 'vuetable-2'
    import CssForBootstrap4 from '../../../components/Common/VuetableCssForBootstrap4';

    export default {
        components: {
            Vuetable
        },
        data() {
            return {
                css: CssForBootstrap4
            }
        }
    }
</script>