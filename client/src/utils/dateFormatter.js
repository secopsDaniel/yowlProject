
export function formatDateFriendly(date) {


  const now = new Date();
  const postDate = new Date(date);

  const seconds = Math.floor((now - postDate) / 1000);

  // Moins d'une minute
  if (seconds < 60) {
    return 'À l\'instant';
  }

  // Minutes
  const minutes = Math.floor(seconds / 60);
  if (minutes < 60) {
    return `il y a ${minutes}m`;
  }

  // Heures
  const hours = Math.floor(minutes / 60);
  if (hours < 24) {
    return `il y a ${hours}h`;
  }

  // Jours
  const days = Math.floor(hours / 24);
  if (days < 7) {
    return `il y a ${days}j`;
  }

  // Semaines
  const weeks = Math.floor(days / 7);
  if (weeks < 4) {
    return `il y a ${weeks}sem`;
  }

  // Mois
  const months = Math.floor(days / 30);
  if (months < 12) {
    return `il y a ${months}mois`;
  }

  // Années
  const years = Math.floor(months / 12);
  return `il y a ${years}an${years > 1 ? 's' : ''}`;
}

