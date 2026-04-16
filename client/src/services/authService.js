import { kyInstance,getAuthHeaders} from "../api/kyInstance";

export const authService = {
 async login(credentials) {
  const res = await kyInstance.post("login", {
    json: credentials
  }).json();

  localStorage.setItem("token", res.token);

  return res;
},

  async register(data) {

    await kyInstance.post("register", {

        json: data,
       }).json();
  },

  async logout() {
    await kyInstance.post("logout");
  },

  async getme() {
    return await kyInstance.get("user",{
       headers: getAuthHeaders()
    }

    ).json();
  },
};
