import { kyInstance, getAuthHeaders } from '@/api/kyInstance';

export const postService = {
  async create(data) {
    return await kyInstance.post('post', {
      json: data,
      headers: getAuthHeaders(),
    }).json();
  },

  async getAll({page = 1, categ_id = null} = {}) {
    let url = `posts?page=${page}`;
    if (categ_id) {
      url += `&categ_id=${categ_id}`;
    }
    return await kyInstance.get(url, {
      headers: getAuthHeaders(),
    }).json();
  },

  async getById(id) {
    return await kyInstance.post(`post/${id}`, {
      headers: getAuthHeaders(),
    }).json();
  },

 
};
