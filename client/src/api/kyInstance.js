import ky from "ky";
import Cookies from "js-cookie";

const apiUrl = import.meta.env.VITE_API_URL;

export const kyInstance = ky.create({
 prefix: `${apiUrl}/api`,

 headers : {
   Accept: 'application/json',
 },

 timeout:5000,
 credentials:"include",
 hooks : {
     beforeRequest: (
      request => {
        const token = Cookies.get('XSRF-TOKEN')
        if (token) {
           request.headers.set('X-XSRF-TOKEN',token)
          
        }
      }
     )
 }

})

export async function getCsrfCookie() {
  await kyInstance.get('sanctum/csrf-cookie')
}