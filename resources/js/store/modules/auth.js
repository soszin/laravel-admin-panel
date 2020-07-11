import axios from 'axios';

const AuthModule = {

    getters: {
        getCurrentUser(state) {
            return state.user;
        }
    },
    mutations: {
        setUser(state, item) {
            state.user = item;
        },
    },
    actions: {
        createUser(context, data) {
            return axios.post('/api/auth/register', data)
                .then(function(response) {
                    context.commit('setUser', response.data.data);
                    return response.data.data;
                });
        }
    }
};

export default AuthModule;