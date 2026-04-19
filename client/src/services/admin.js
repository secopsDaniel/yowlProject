import { kyInstance } from '@/api/kyInstance';

export const adminService = {

async fetchUsers () {
    try {
      return await kyInstance.get('admin/users').json();
        // console.log("regarde ici pardon! : ", response);
    } catch (error) {
        console.error("Il y a une erreur : ", error)
    }
},

async deleteUser(id){
  try{
         return await kyInstance.delete(`admin/users/${id}`);
        } catch (error){
            console.error("Il y a une erreur", error);
        }

},

async updateUser(user){

   try {
        await kyInstance.put(`admin/users/${user.id}`, {
            json: user
        });
    }catch(error){
        console.error("Il y a une erreur sur la mise à jour", error)
    }
}


}

