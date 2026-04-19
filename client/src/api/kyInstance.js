import ky from "ky";

const apiUrl = import.meta.env.VITE_API_URL;

export const kyInstance = ky.create({
 prefix: `${apiUrl}/api`,

 headers : {
   Accept: 'application/json',
 },

 timeout: 60000, 


})

export function getAuthHeaders() {
  const token = localStorage.getItem("token")?.trim();

  return token
    ? { Authorization: `Bearer ${token}` }
    : {};
}

export async function parseApiError(error) {
  if (!error.response) {
    // Erreur réseau (
    return {
      message: "Erreur de connexion réseau. Vérifiez votre connexion internet.",
      status: 0,
      errors: {},
      type: 'network'
    };
  }

  const status = error.response.status;
  let data;

  try {
    data = await error.response.json();
  } catch {
    // Si la réponse n'est pas du JSON valide
    return {
      message: `Erreur serveur (${status})`,
      status,
      errors: {},
      type: 'server'
    };
  }

  // Gestion spécifique des erreurs 422 (validation)
  if (status === 422) {
    const validationErrors = data.errors || {};
    const firstError = Object.values(validationErrors)[0]?.[0] || data.message || "Erreurs de validation";

    return {
      status: 422,
      message: firstError,
      errors: validationErrors,
      type: 'validation'
    };
  }

  // Gestion des autres erreurs
  return {
    status,
    message: data.message || `Erreur ${status}`,
    errors: data.errors || {},
    type: 'server'
  };
}
