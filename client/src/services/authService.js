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

  async sendAuthEmail(user){
   const res =  await kyInstance.post("email/verification-notification",{
     json: user,
      headers : getAuthHeaders()
    })
    return res;
  },

  async logout() {
    await kyInstance.post("logout",{
      headers : getAuthHeaders()
    }).json();
  },

  async getme() {
    return await kyInstance.get("user",{
       headers: getAuthHeaders()
    }

    ).json();
  },

async editMe(id,data) {
  await kyInstance.post(`user/edit/${id}`,{
  headers:getAuthHeaders(),
  json:data
  }).json();

}

};
