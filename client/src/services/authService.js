import { kyInstance ,getCsrfCookie} from '../api/kyInstance';

export const authService = {
   async login(credentials) {
        getCsrfCookie()
        await kyInstance.post('login', { json: credentials }).json();
    },

   async register(userData) {
        await kyInstance.post('register', { json: userData }).json();
    },
};
