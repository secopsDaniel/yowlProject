import { kyInstance ,getAuthHeaders} from "@/api/kyInstance";


export const categorieService = {

   async getAll(){
      const res = await kyInstance.get("categories",{
             headers : getAuthHeaders()
          }).json()

    return res;
   },

   async create (data){
        return await kyInstance.post('categories',{
            json : data,
            headers : getAuthHeaders()
           }).json()
     }

}
