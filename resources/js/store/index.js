import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";

import SettingModule from './modules/setting.js'
import SettingPlugin from './plugins/setting.js'
import ThemeModule from './modules/theme.js'
import ThemePlugin from './plugins/theme.js'
import AuthModule from './modules/auth.js'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    modules: {
        setting: SettingModule,
        theme: ThemeModule,
        auth: AuthModule
    },
    plugins: [
        createPersistedState({
            reducer: (persistedState) => {
                const stateFilter = JSON.parse(JSON.stringify(persistedState)); // deep clone
                ['offsidebarOpen', 'asideToggled', 'horizontal'] // states which we don't want to persist.
                    .forEach(item => delete stateFilter.setting[item]);
                return stateFilter
            }
        }),
        SettingPlugin,
        ThemePlugin
    ]
})