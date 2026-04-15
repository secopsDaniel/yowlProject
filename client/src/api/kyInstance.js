import ky from "ky";

const apiUrl = import.meta.env.VITE_API_URL;

export const kyInstance = ky.create({
 prefix: `${apiUrl}/api`,

 headers : {
   Accept: 'application/json',
 },

 timeout:5000,
 credentials:"include"

})

export async function getCsrfCookie() {
  await kyInstance.get('sanctum/csrf-cookie')
}