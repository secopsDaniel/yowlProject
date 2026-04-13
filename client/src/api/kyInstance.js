import ky from "ky";
import { getToken } from "./auth";

const apiUrl = import.meta.env.VITE_API_URL;

export const kyInstance = ky.create({
 prefix: `${apiUrl}/api`,

 headers : {
   Accept: 'application/json',
 },

 timeout:5000,

  hooks: {
    beforeRequest: [
       (request) => {
            const token  = getToken()
            if (token) {
               request.headers.set('Authorization', `Bearer ${token}`);
            }

       }

    ],

     afterResponse: [
      async (response) => {
        if (response.status === 401) {
          localStorage.removeItem('token');
          window.location.href = '/login';
        }
      }
    ]
  }

})
