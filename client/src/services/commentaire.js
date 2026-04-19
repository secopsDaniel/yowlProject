import { kyInstance, getAuthHeaders } from '@/api/kyInstance';

export const CommentService = {
  
 async createComment(data) {
    return await kyInstance.post('comments', {
      json: data,
      headers: getAuthHeaders(),
    }).json();
  },

  async updateComment(id, data) {
    return await kyInstance.put(`comments/${id}`, {
      json: data,
      headers: getAuthHeaders(),
    }).json();
  },

  async deleteComment(id) {
    return await kyInstance.delete(`comments/${id}`, {
      headers: getAuthHeaders(),
    }).json();
  },

}