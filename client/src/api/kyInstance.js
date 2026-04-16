import ky from "ky";

const apiUrl = import.meta.env.VITE_API_URL;

export const kyInstance = ky.create({
 prefix: `${apiUrl}/api`,

 headers : {
   Accept: 'application/json',
 },

 timeout:5000,


})

export function getAuthHeaders() {
  const token = localStorage.getItem("token")?.trim();

  return token
    ? { Authorization: `Bearer ${token}` }
    : {};
}

export async function parseApiError(error) {
  if (!error.response) {
    return { message: "Network error", status: 0 };
  }

  const status = error.response.status;
  const data = await error.response.json().catch(() => ({}));

  return {
    status,
    message: data.message || "Error",
    errors: data.errors || {},
  };
}
