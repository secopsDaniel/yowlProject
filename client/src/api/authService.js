import { kyInstance } from './kyInstance';

export const authService = {
    login(credentials) {
        return kyInstance.post('login', { json: credentials }).json();
    },

    register(userData) {
        return kyInstance.post('register', { json: userData }).json();
    },
};
