import { kyInstance, getAuthHeaders } from '@/api/kyInstance';

export const postService = {
  async create(data) {
    return await kyInstance.post('post', {
      json: data,
      headers: getAuthHeaders(),
    }).json();
  },
};
